<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Star;
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

        if (!$message) {
            return response('OK', 200);
        }

        $chatId = $message['chat']['id'];
        $text = $message['text'];

        if ($text === '/start') {
            $this->sendWelcomeMessage($chatId);
        } elseif (str_starts_with($text, '/activate')) {
            $this->activateStudent($chatId, $text);
        } elseif ($text === '/history') {
            $this->sendLastTenStars($chatId);
        } elseif ($text === '/allstars') {
            $this->sendAllStars($chatId);
        } elseif ($text === '/balance') {
            $this->sendBalance($chatId);
        }
    }

    protected function sendWelcomeMessage($chatId)
    {
        $message = "Привіт! Використайте команду /activate <код> для авторизації.";
        $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => $message]);
    }

    protected function activateStudent($chatId, $text)
    {
        $code = trim(str_replace('/activate', '', $text));

        $student = Student::where('activation_code', $code)->first();
        if (!$student) {
            $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Невірний код активації."]);
            return;
        }

        $student->update(['telegram_id' => $chatId]);
        $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Ви успішно авторизовані!"]);
    }

    protected function sendLastTenStars($chatId)
    {
        $student = Student::where('telegram_id', $chatId)->first();
        if (!$student) {
            $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Ви не авторизовані."]);
            return;
        }

        $stars = $student->stars()->latest()->take(10)->get();

        if ($stars->isEmpty()) {
            $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Немає записів про зірки."]);
            return;
        }

        $message = "Ваші останні зірки:\n";
        foreach ($stars as $star) {
            $message .= "- {$star->points} балів (дата: {$star->created_at->format('d.m.Y')})\n";
        }

        $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => $message]);
    }

    protected function sendAllStars($chatId)
    {
        $student = Student::where('telegram_id', $chatId)->first();
        if (!$student) {
            $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Ви не авторизовані."]);
            return;
        }

        $stars = $student->stars()->get();

        if ($stars->isEmpty()) {
            $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Немає записів про зірки."]);
            return;
        }

        $message = "Ваш повний список зірок:\n";
        foreach ($stars as $star) {
            $message .= "- {$star->points} балів (дата: {$star->created_at->format('d.m.Y')})\n";
        }

        $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => $message]);
    }

    protected function sendBalance($chatId)
    {
        $student = Student::where('telegram_id', $chatId)->first();
        if (!$student) {
            $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Ви не авторизовані."]);
            return;
        }

        $balance = $student->stars()->sum('points');
        $this->telegram->sendMessage(['chat_id' => $chatId, 'text' => "Ваш баланс зірок: {$balance} балів."]);
    }
}
