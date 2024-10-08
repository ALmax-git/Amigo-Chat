<?php

namespace App\Livewire;

use Livewire\Component;

class ChatBox extends Component
{
    public $friend;
    public function render()
    {
        return view('livewire.chat-box');
    }
}