<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Telegram
{
    public function sendMessage($chat_id, $message, $bot)
    {
        return Http::timeout(10)->retry(5)->post("https://api.telegram.org/bot" . $bot . "/sendMessage", [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);
    }

    public function sendButtons($chat_id, $message, $button, $bot)
    {
        return Http::timeout(10)->retry(5)->post("https://api.telegram.org/bot" . $bot . "/sendMessage", [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'HTML',
            'reply_markup' => $button
        ]);
    }

    public function sendDocument($chat_id, $file, $bot)
    {
        return Http::timeout(10)->retry(5)->attach('document', Storage::get('/public/' . $file), $file)
            ->post("https://api.telegram.org/bot" . $bot . "/sendDocument", [
                'chat_id' => $chat_id,
            ]);
    }

    // public function sendQr($chat_id, $text, $bot)
    // {
    //     return Http::timeout(10)->retry(5)->attach('document', QrCode::format('png')->encoding('UTF-8')->size(500)->generate($text), 'qrcode.png')
    //         ->post("https://api.telegram.org/bot" . $bot . "/sendDocument", [
    //             'chat_id' => $chat_id,
    //         ]);
    // }

    public function getFile($bot, $file_id){
        return Http::timeout(10)->retry(5)->post("https://api.telegram.org/bot" . $bot . "/getFile", [
            'file_id' => $file_id,
        ]);
    }

    public function sendVideo($chat_id, $video, $bot)
    {
        return Http::timeout(10)->retry(5)->post("https://api.telegram.org/bot" . $bot . "/sendVideo", [
            'chat_id' => $chat_id,
            'video' => $video
        ]);
    }

    public function sendVideoNote($chat_id, $video, $bot)
    {
        return Http::timeout(10)->retry(5)->post("https://api.telegram.org/bot" . $bot . "/sendVideoNote", [
            'chat_id' => $chat_id,
            'video_note' => $video
        ]);
    }
}
