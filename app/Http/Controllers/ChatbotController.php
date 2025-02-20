<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $userMessage = $request->input('message');

        $client = new Client();
        $response = $client->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent', [
            'query' => ['key' => config('services.gemini.api_key')],
            'json' => [
                'contents' => [
                    ['parts' => [['text' => $userMessage]]]
                ]
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return response()->json(['reply' => $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya tidak dapat menjawab.']);
    }
}
