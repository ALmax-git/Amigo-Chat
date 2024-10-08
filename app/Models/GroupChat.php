<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'created_by', 'admin_id', 'status'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_group')->withPivot('status');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
