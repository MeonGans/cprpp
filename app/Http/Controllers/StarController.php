<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Event;
use App\Models\Star;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class StarController extends Controller
{

    protected $telegram;

    public function __construct()
    {
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Отримати всіх учнів з їх загальною кількістю зірок та останніми 10 записами
        $students = Student::with(['stars'])->get();

        // Додати загальну кількість зірок для кожного учня
        $students = $students->map(function ($student) {
            $student->totalStars = $student->stars->sum('amount'); // Загальна кількість зірок
            return $student;
        });

    // Повернення даних у view
    return view('admin.stars.stars_list', compact('students'));
    }
    public function index_full()
    {
        $courses = Course::whereHas('certificates')
            ->orderBy('course_date', 'desc')
            ->get();
        return view('admin.courses.courses_list_full', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('admin.stars.add_star', compact('students'));
    }

    public function create_more()
    {
        $students = Student::all();
        return view('admin.stars.add_star_more', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Carbon::setLocale('uk');
        // Валідація даних
        $request->validate([
            'students' => 'required|array', // Масив учнів
            'students.*.student' => 'required|string|max:255',
            'students.*.course' => 'required|string',
            'students.*.points' => 'required|integer',
        ]);


        // Перевірка наявності учасників
        if ($request->has('students') && is_array($request->students)) {

            // Зберігаємо учасників та їх сертифікати
            foreach ($request->students as $student) {
                if($student['points'] == 10) {
                    $amount = 5;
                } elseif ($student['points'] == 11) {
                    $amount = 7;
                } elseif ($student['points'] == 12) {
                    $amount = 10;
                } else {
                    $amount = 0;
                }
                $reason = "за тематичну оцінку {$student['points']} з предмету \"{$student['course']}\" ";

                $star = Star::create(
                    [
                        'student_id' => $student['student'],
                        'amount' => $amount,
                        'reason' => $reason,
                    ]
                );
                // Відправляємо повідомлення учню в Telegram
                // Знайти студента в базі за ID
                $studentModel = Student::find($student['student']);
                if ($studentModel && !empty($studentModel->telegram_id)) {
                    $this->sendTelegramNotification($studentModel, $star);
                }
            }
        }

        return redirect()->route('star_list')->with('success', 'Зірки додано успішно!');
    }

    public function store_more(Request $request)
    {
        Carbon::setLocale('uk');
        // Валідація даних
        $request->validate([
            'students' => 'required|array', // Масив учнів
            'students.*.student' => 'required|string|max:255',
            'students.*.reason' => 'required|string',
            'students.*.amount' => 'required|integer',
        ]);


        // Перевірка наявності учасників
        if ($request->has('students') && is_array($request->students)) {

            // Зберігаємо учасників та їх сертифікати
            foreach ($request->students as $student) {
                $star = Star::create(
                    [
                        'student_id' => $student['student'],
                        'amount' => $student['amount'],
                        'reason' => $student['reason'],
                    ]
                );
                // Знайти студента в базі за ID
                $studentModel = Student::find($student['student']);
                if ($studentModel && !empty($studentModel->telegram_id)) {
                    $this->sendTelegramNotification($studentModel, $star);
                }
            }
        }

        return redirect()->route('star_list')->with('success', 'Зірки додано успішно!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Course $course): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // Завантажуємо сертифікати для переданого курсу
        $course->load('certificates');

        // Повертаємо представлення з переданими даними про курс
        return view('admin.courses.course', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit_event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Перевірка наявності всіх обов'язкових полів
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        // Створення новини з отриманих даних і збереження її в базі даних
        $event->update($request->all());

        // Повернення на сторінку зі списком новин з повідомленням про успішне створення
        return redirect()->route('events_list')->with('success', 'Подію успішно відредаговано!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    protected function sendTelegramNotification($student, $star)
    {
        $nameParts = explode(' ', $student->name);
        $firstName = $nameParts[1] ?? $student->name;

        $amount = $star->amount > 0 ? '+' . $star->amount : $star->amount;
        $reason = $star->reason ? "Причина: {$star->reason}" : "Без причини";


        if ($amount > 0) {
            $re = 'Тобі додано ';
        } else {
            $re = 'В тебе знято ';
        }

        $message = "Привіт, {$firstName}! 🌟\n\n" .
            "{$re} {$amount} ⭐!\n" .
            "{$reason}\n\n" .
            "Твій новий баланс: " . $student->stars()->sum('amount') . " ⭐.";

        // Відправка повідомлення
        $this->telegram->sendMessage([
            'chat_id' => $student->telegram_id,
            'text' => $message
        ]);
    }
}
