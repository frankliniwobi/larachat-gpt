<?php

use App\AI\Chat;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $chat = new Chat();

    $poem = $chat->hasSystemMessage('You are a poetic assistant, skilled in explaining complex programming concepts with creative flair.')
        ->send('Compose a poem that explains the concept of recursion in programming.');

    // dd($poem);

    $otherPoem = $chat->reply('make it about the ocean');

    return view('welcome', [
        'response' => $otherPoem
    ]);
});