
<div>
    {{-- Chat Toggle Button --}}
    <button wire:click="toggleChat" class="bg-blue-500 text-white px-4 py-2 rounded">
        {{ $chatToggle ? 'Close Chat' : 'Open Chat' }}
    </button>

    {{-- Chat Box --}}
    @if ($chatToggle)
    <div class="chat-container mt-4">
        {{-- Message List --}}
        <div class="message-list h-96 overflow-y-scroll">
            @forelse($messages as $message)
            <div class="message-item mb-2">
                <strong>{{ $message->sender->name }}</strong>: {{ $message->content }}

                {{-- Display attachment if exists --}}
                @if($message->attachment)
                <div>
                    <a href="{{ asset('storage/' . $message->attachment) }}" target="_blank" class="text-blue-500">View
                        Attachment</a>
                </div>
                @endif

                <span class="text-xs text-gray-400">{{ $message->created_at->diffForHumans() }}</span>
            </div>
            @empty
            <p>No messages yet.</p>
            @endforelse

            {{-- Pagination --}}
            {{ $messages->links() }}
        </div>

        {{-- Send Message Form --}}
        <form wire:submit.prevent="sendMessage" class="mt-4" enctype="multipart/form-data">
            <input type="text" wire:model="messageContent" class="w-full p-2 border rounded"
                placeholder="Type your message here">
            <input type="file" wire:model="attachment" class="mt-2 w-full p-2 border rounded">

            <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-2 rounded">Send</button>
        </form>

        {{-- Error handling --}}
        @error('messageContent') <span class="text-red-500">{{ $message }}</span> @enderror
        @error('attachment') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    @endif

    {{-- Livewire Alerts --}}
    <x-livewire-alert::scripts />
</div>