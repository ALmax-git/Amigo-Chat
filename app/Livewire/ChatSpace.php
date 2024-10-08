<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatSpace extends Component
{
    public $friend;

    public function mount($friend = null)
    {
        $this->friend = $friend;
    }

    public function render()
    {
        return view('livewire.chat-space', [
            'friend' => $this->friend
        ]);
    }
}