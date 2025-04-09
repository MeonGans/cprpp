<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::whereHas('certificates')
            ->orderBy('course_date', 'desc')
            ->get();
        return view('admin.courses.courses_list', compact('courses'));
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
        return view('admin.courses.add_course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Carbon::setLocale('uk');
        // Валідація даних
        $request->validate([
            'title' => 'required|string|max:255',
            'course_type' => 'required|string|max:255',
            'date' => 'required|date',
            'duration_hours' => 'required|integer',
            'practical_skill' => 'nullable|boolean',
            'participants' => 'required|array', // Масив учасників
            'participants.*.name' => 'required|string|max:255',
            'participants.*.gender' => 'required|string|in:male,female',
        ]);

        // Зберігаємо дані про курс
        $course = Course::create([
            'title' => $request->title,
            'course_type' => $request->course_type,
            'course_date' => $request->date,
            'duration_hours' => $request->duration_hours,
            'practical_skill' => $request->practical_skill,
        ]);

        //Створюємо відповідну папку, враховуючи дату курсу
//        Carbon::setLocale('ru');
        $currentYearMonth = Carbon::parse($course->course_date)->format('m-Y');

        $folderPath = public_path('certificates/' . $currentYearMonth);
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        // Перевірка наявності учасників
        if ($request->has('participants') && is_array($request->participants)) {
            // Поточний рік
            $currentYear = Carbon::now()->year;

            // Зберігаємо учасників та їх сертифікати
            foreach ($request->participants as $participant) {
                // Отримуємо максимальний номер сертифікату для поточного року
                $lastCertificate = Certificate::whereYear('created_at', $currentYear)
                    ->latest('certificate_number')
                    ->first();

                // Генерація наступного номера сертифікату
                if ($lastCertificate) {
                    $lastNumber = (int) substr($lastCertificate->certificate_number, -4); // останні 4 цифри
                    $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
                } else {
                    // Якщо сертифікатів в цьому році ще не було
                    $nextNumber = '0001';
                }

//                // Формуємо номер сертифікату
//                $certificateNumber = $currentYear . '-' . $nextNumber;

                // Створюємо сертифікат
                $certificate = new Certificate([
                    'name' => $participant['name'],
                    'gender' => $participant['gender'],
                    'course_id' => $course->id,
                    'certificate_number' => $nextNumber, // Використовуємо згенерований номер
                    'status' => 'not_issued', // Статус сертифікату (за замовчуванням "Не видано")
                ]);

                $certificate->save();

                //Генеруємо відповідний сертифікат
                $manager = new ImageManager(new Driver());
                $image = $manager->read(public_path('images/template.jpg'));

                // Формуємо текст залежно від статі учасника
                $genderText = ($participant['gender'] === 'female') ? 'взяла' : 'взяв';
                $receivedText = ($participant['gender'] === 'female') ? 'отримала' : 'отримав';
                $practiceText = ($course->practical_skill === '1') ? 'та практичні' : '';

                if($course->duration_hours == '2') {
                    $ects = '0.07';
                } elseif ($course->duration_hours == '4') {
                    $ects = '0.13';
                } elseif ($course->duration_hours == '6') {
                    $ects = '0.2';
                } elseif ($course->duration_hours == '10') {
                    $ects = '0.3';
                } elseif ($course->duration_hours == '15') {
                    $ects = '0.5';
                } elseif ($course->duration_hours == '30') {
                    $ects = '1';
                }

                // Додавання імені учасника
                $image->text($participant['name'], 610, 600, function($font) {
                    $font->file(public_path('fonts/GreatVibes-Regular.ttf'));
                    $font->size(75);
                    $font->color('#244b75');
                    $font->align('left');
                    $font->valign('top');
                    $font->wrap(1463);
                });

                // Додавання тексту про участь
                $image->text("{$genderText} участь у {$course->course_type} тривалістю {$course->duration_hours} години ({$ects} ЄКТС) на тему: “{$course->title}” та {$receivedText} відповідні теоретичні {$practiceText} навички.", 297, 707, function($font) {
                    $font->file(public_path('fonts/CalmiusSans-Low.ttf'));
                    $font->size(37);
                    $font->lineHeight(2.3);
                    $font->color('#244b75');
                    $font->align('left');
                    $font->valign('top');
                    $font->wrap(1463);
                });
                // Додавання дати (формат: місяць рік)


                $dateText = Carbon::parse($course->course_date)->isoformat('D MMMM YYYY');
                $image->text($dateText, 1256, 1093, function($font) {
                    $font->file(public_path('fonts/CalmiusSans-LowBold.ttf'));
                    $font->size(28);
                    $font->lineHeight(2.3);
                    $font->color('#244b75');
                    $font->align('center');
                    $font->valign('top');
                    $font->wrap(1463);
                });


                $year = Carbon::now()->format('y');
                $image->text("44250583/{$nextNumber}-{$year}", 1550, 1232, function($font) {
                    $font->file(public_path('fonts/CalmiusSans-LowBold.ttf'));
                    $font->size(24);
                    $font->lineHeight(2.3);
                    $font->color('#244b75');
                    $font->align('left');
                    $font->valign('top');
                    $font->wrap(1463);
                });

                // Збереження обробленого зображення в папку
                $imagePath = $folderPath . '/' . $nextNumber . '.jpg';
                $image->save($imagePath);
            }
        }

        return redirect()->route('course_list')->with('success', 'Сертифікацію успішно додано!');
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
}
