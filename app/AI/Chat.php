<?php

namespace App\AI;

use Illuminate\Support\Facades\Http;

class Chat
{
    protected array $messages = [];

    public function messages()
    {
        return $this->messages;
    }

    public function hasSystemMessage(string $message) : static
    {
        $this->messages[] = [
            'role' => 'system',
            'content' => $message
        ];

        return $this;
    }

    public function send(string $message)
    {
        $this->messages[] = [
            'role' => 'user',
            'content' => $message
        ];

        $response = Http::withToken(config('services.openai.secret'))
            ->post('https://api.openai.com/v1/chat/completions',
            [
                "model"    => "gpt-3.5-turbo",
                "messages" => $this->messages,
            ])->json('choices.0.message.content');

        if ($response) {
            $this->messages[] = [
                'role' => 'assistant',
                'content' => $response
            ];
        }

        return $response;
    }

    public function reply(string $message) : ?string
    {
        return $this->send($message);
    }

}