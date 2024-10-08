<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Main extends Component
{
    public $friends, $friend;
    public function mount()
    {
        $this->friends = User::all();
        $this->friend =  Auth::user();
    }

    public function toggle_chat_box($friendId)
    {
        $friend = User::find($friendId);
        if ($friend && $friend->id !== Auth::id()) {
            $this->friend = $friend;
        }
    }


    public function render()
    {
        return view('livewire.main');
    }
}
