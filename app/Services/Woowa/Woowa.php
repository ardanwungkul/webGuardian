<?php

namespace App\Services\Woowa;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Woowa
{
    public function sendWhatsapp($no_hp, $messages)
    {
        $key = env('WOO_WA_KEY');
        $url = 'http://116.203.191.58/api/send_message';
        $messages = str_replace(["\r\n", "\r", "\n"], '\n', $messages);
        $data = [
            "phone_no" => '+' . $no_hp,
            "key"      => $key,
            "message"  => $messages
        ];
        $client = new Client();
        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Basic dXNtYW5ydWJpYW50b3JvcW9kcnFvZHJiZWV3b293YToyNjM3NmVkeXV3OWUwcmkzNDl1ZA=='
                ],
                'json' => $data
            ]);
            $statusCode = $response->getStatusCode();
            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
