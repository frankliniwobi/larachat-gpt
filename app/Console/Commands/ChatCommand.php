<?php

namespace App\Console\Commands;

use App\AI\Chat;
use Illuminate\Console\Command;

class ChatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start a Conversation with OpenAI';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $question = $this->ask('How can I help you today?');

        $chat = new Chat();

        $answer = $chat->send($question);

        $this->info($answer);

        while ($this->ask('Do you have another question?')) {

            $reply = $this->ask('What is your question?');

            $answer = $chat->reply($reply);

            $this->info($answer);

        }

        $this->info('The conversation has ended');
    }
}
