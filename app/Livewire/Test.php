<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; // For attachments
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Test extends Component
{
     use LivewireAlert, WithFileUploads, WithPagination;

    public $messageContent;
    public $attachment; // For file uploads
    public $groupId; // For handling group messages
    public $chatToggle = false; // For toggling chat visibility

    protected $rules = [
        'messageContent' => 'required_without:attachment|string|max:255',
        'attachment' => 'nullable|file|max:10240', // Max 10MB file size
    ];

    public function render()
    {
        $messages = Message::where('group_id', $this->groupId)
            ->orWhere(function ($query) {
                $query->where('sender_id', Auth::id());
            })
            ->latest()
            ->paginate(10);

        return view('livewire.test', compact('messages'));
    }

    public function sendMessage()
    {
        $this->validate();

        try {
            $filePath = null;

            // Handle file upload if any
            if ($this->attachment) {
                $filePath = $this->attachment->store('attachments', 'public');
            }

            // Create message
            Message::create([
                'content' => $this->messageContent,
                'attachment' => $filePath, // Store file path if attachment exists
                'sender_id' => Auth::id(),
                'group_id' => $this->groupId,
            ]);

            // Feedback alert for successful message
            $this->alert('success', 'Message Sent!');

            // Clear input fields after sending
            $this->messageContent = '';
            $this->attachment = null;

            // Emit event for real-time updates
            $this->emit('messageSent');
        } catch (\Exception $e) {
            // Error alert
            $this->alert('error', 'Failed to send message: ' . $e->getMessage());
        }
    }

    public function toggleChat()
    {
        $this->chatToggle = !$this->chatToggle;
    }

    protected $listeners = ['messageSent' => '$refresh'];
   
}