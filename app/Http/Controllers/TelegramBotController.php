<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramBotController extends Controller
{
    protected $telegram;

    public function __construct()
    {
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    }

    public function handle(Request $request)
    {
        $update = $this->telegram->getWebhookUpdate();
        $message = $update['message'] ?? null;
        $callbackQuery = $update['callback_query'] ?? null;

        if ($callbackQuery) {
            $this->handleCallback($callbackQuery);
            return response('OK', 200);
        }

        if (!$message) {
            return response('OK', 200);
        }

        $chatId = $message['chat']['id'];
        $text = $message['text'];

        $student = Student::where('telegram_id', $chatId)->first();

        if (!$student) {
            // Перевіряємо, чи користувач у стані очікування коду
            if (cache()->has("waiting_activation_code_{$chatId}")) {
                // Викликаємо функцію активації
                $this->activateStudent($chatId, $text);
                return response('OK', 200);
            }

            $this->sendRegistrationPrompt($chatId);
            return response('OK', 200);
        }


        // Додавання кнопок до кожної відповіді для авторизованого користувача
        switch ($text) {
            case '/start':
                $this->sendWelcomeMessage($chatId);
                break;
            case '/history':
                $this->sendLastTenStars($chatId);
                break;
            case '/allstars':
                $this->sendAllStars($chatId);
                break;
            case '/balance':
                $this->sendBalance($chatId);
                break;
            default:
                $this->sendUnknownCommand($chatId);
                break;
        }
    }

    protected function sendRegistrationPrompt($chatId)
    {
        $message = "Ви не авторизовані. Натисніть 'Зареєструватись', щоб ввести свій код активації.";
        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'Зареєструватись', 'callback_data' => 'register']
                ],
            ],
        ];

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode($keyboard)
        ]);
    }

    protected function activateStudent($chatId, $text)
    {
        $code = trim(str_replace('/activate', '', $text));

        $student = Student::where('activation_code', $code)->first();
        if (!$student) {
            $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Невірний код активації."]);
            return;
        }

// Прив'язуємо Telegram ID і завершуємо активацію
        $student->update(['telegram_id' => $chatId]);

// Видаляємо стан очікування
        cache()->forget("waiting_activation_code_{$chatId}");

        $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Ви успішно авторизовані!"]);
        $this->sendWelcomeMessage($chatId);
    }

    protected function sendWelcomeMessage($chatId)
    {
        // Отримуємо учня з бази за Telegram ID
        $student = Student::where('telegram_id', $chatId)->first();

        if ($student) {
            // Розділяємо Прізвище та Ім'я, використовуючи пробіл як розділювач
            $fullName = $student->name;
            $nameParts = explode(' ', $fullName);
            $firstName = $nameParts[1] ?? ''; // Беремо друге слово як ім'я

            // Формуємо повідомлення
            $message = "Привіт, {$firstName}! Ти в системі обліку зірок! 🌟\n\n" .
                "Тут ти можеш перевірити свій баланс або історію поповнень.\n" .
                "Якщо будуть питання або пропозиції — звертайся до Олексія Дмитровича @meongans.";

            $keyboard = $this->getAuthorizedKeyboard();

            // Відправляємо повідомлення з меню
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $message,
                'reply_markup' => json_encode($keyboard)
            ]);
        } else {
            // Якщо учня не знайдено, надсилаємо стандартне повідомлення
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => "Ви не авторизовані. Будь ласка, зареєструйтесь, натиснувши кнопку нижче.",
            ]);
        }
    }

    protected function handleCallback($callbackQuery)
    {
        $chatId = $callbackQuery['message']['chat']['id'];
        $callbackData = $callbackQuery['data'];

        if ($callbackData === 'register') {
            // Переводимо користувача в стан очікування коду активації
            cache()->put("waiting_activation_code_{$chatId}", true, now()->addMinutes(10));

            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => "Будь ласка, введіть свій код активації."
            ]);
        } else {
            $student = Student::where('telegram_id', $chatId)->first();
            if (!$student) {
                $this->sendRegistrationPrompt($chatId);
                return;
            }

            switch ($callbackData) {
                case 'history':
                    $this->sendLastTenStars($chatId);
                    break;
                case 'balance':
                    $this->sendBalance($chatId);
                    break;
                case 'allstars':
                    $this->sendAllStars($chatId);
                    break;
                default:
                    $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Невідома команда"]);
                    break;
            }
        }
    }


    protected function sendLastTenStars($chatId)
    {
        $student = Student::where('telegram_id', $chatId)->first();
        $message = $student ? "Ваші останні зірки ⭐:\n" : "Ви не авторизовані.";

        $stars = $student->stars()->latest()->take(10)->get();
        foreach ($stars as $star) {
            $oper = $star->amount > 0 ? '+' : '';

            $message .= "{$oper} {$star->amount} ⭐  {$star->reason}\n";
        }

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode($this->getAuthorizedKeyboard())
        ]);
    }

    protected function sendBalance($chatId)
    {
        $student = Student::where('telegram_id', $chatId)->first();
        $balance = $student ? $student->stars()->sum('amount') : 0;

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => "Ваш баланс: {$balance} ⭐.",
            'reply_markup' => json_encode($this->getAuthorizedKeyboard())
        ]);
    }

    protected function sendAllStars($chatId)
    {
        $student = Student::where('telegram_id', $chatId)->first();
        $message = $student ? "Ваш повний список зірок ⭐:\n" : "Ви не авторизовані.";

        $stars = $student->stars()->get();
        foreach ($stars as $star) {
            $oper = $star->amount > 0 ? '+' : '';
            $message .= "{$oper} {$star->amount} ⭐  {$star->reason}\n";
        }

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode($this->getAuthorizedKeyboard())
        ]);
    }

    protected function getAuthorizedKeyboard()
    {
        return [
            'inline_keyboard' => [
                [
                    ['text' => '📋 Останні зірки', 'callback_data' => 'history'],
                    ['text' => '💰 Баланс зірок', 'callback_data' => 'balance'],
                ],
                [
                    ['text' => '🕰️ Повна історія зірок', 'callback_data' => 'allstars'],
                ],
            ]
        ];
    }

    protected function sendUnknownCommand($chatId)
    {
        $this->telegram->sendMessageWithCleanup([
            'chat_id' => $chatId,
            'text' => "Невідома команда. Скористайтесь меню.",
            'reply_markup' => json_encode($this->getAuthorizedKeyboard())
        ]);
    }
}
