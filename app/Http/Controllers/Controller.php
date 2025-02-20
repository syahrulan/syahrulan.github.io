<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $prompt = $request->input('prompt');

        $response = OpenAI::chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        return response()->json($response['choices'][0]['message']['content']);
    }
}
