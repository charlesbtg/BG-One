<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\OpenAIService;

class CustomerAssistant extends Component
{
    public $history = [];
    public $userInput;
    public $suggestion;

    public function ask(OpenAIService $openai)
    {
        $this->history[] = ['role' => 'user', 'content' => $this->userInput];

        $reply = $openai->chat([
            ['role' => 'system', 'content' => 'You are Bella, a helpful assistant.'],
            ...$this->history,
        ]);

        $aiMsg = $reply['choices'][0]['message']['content'];
        $this->history[] = ['role' => 'assistant', 'content' => $aiMsg];
        $this->suggestion = $aiMsg;
        $this->userInput = '';
    }

    public function render()
    {
        return view('livewire.customer-assistant');
    }
}
