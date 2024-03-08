<?php

namespace App\Console\Commands;

use App\AI\Chat;
use Illuminate\Console\Command;
use function Laravel\Prompts\{text, spin, info, confirm, alert};

class ChatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat {--system=}';

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
        $chat = new Chat();

        if ($this->option('system')) {
            $chat->hasSystemMessage($this->option('system'));
        }

        $question = text(
            label: 'How can I help you today?',
            required: true,
        );

        $answer = spin(fn () => $chat->send($question), 'Sending request...');

        info($answer);

        while (
            confirm(
                label: 'Do you have another question?',
                default: false,
            )
        ) {

            $reply = text(
                label: 'What is your question?',
                required: true
            );

            $answer = spin(fn () => $chat->reply($reply), 'Sending request...');

            alert($answer);

        }

        info('The conversation has ended');
    }
}
