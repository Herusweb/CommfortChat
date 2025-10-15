<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';
    protected $guarded = false;

    public function users (){
        return $this->belongsToMany(User::class, 'chat_user', 'chat_id', 'user_id');
}
    public function messages (){
        return $this->hasMany(Message::class, 'chat_id', 'id');
    }
}