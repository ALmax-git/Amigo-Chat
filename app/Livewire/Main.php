<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Main extends Component
{
    public $friends, $friend;
    public $new_text_message = '';
    public $messages = [];

    public function mount()
    {
        $this->friends = User::all()->except(Auth::id()); // Exclude the current user
        $this->friend = $this->friend ?? $this->friends->first();
        $this->loadMessages();
    }

    public function updatedFriend()
    {
        $this->loadMessages();
    }

    public function loadMessages()
    {
        if ($this->friend) {
            $this->messages = Message::where(function ($query) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $this->friend->id);
            })->orWhere(function ($query) {
                $query->where('sender_id', $this->friend->id)
                      ->where('receiver_id', Auth::id());
            })->orderBy('created_at')->get();
        }
    }

    public function toggleChatBox($friendId)
    {
        $friend = User::find($friendId);
        if ($friend && $friend->id !== Auth::id()) {
            $this->friend = $friend;
        }
        $this->loadMessages();
    }

    public function sendMessage()
    {
        if ($this->new_text_message && $this->friend) {
            Message::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $this->friend->id,
                'content' => $this->new_text_message,
                'message_type' => 'text',
                'has_attachment' => false,
            ]);

            $this->new_text_message = '';
            $this->loadMessages();
        }
    }

    public function render()
    {
        return view('livewire.main');
    }
}
