<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id', 'content', 'message_type', 'has_attachment', 
        'attachment_id', 'receiver_id', 'status', 'deleted_at', 
        'deleted_by', 'is_seen'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function attachment()
    {
        return $this->belongsTo(File::class, 'attachment_id');
    }
}
