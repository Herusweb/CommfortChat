<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class MessageStatus extends Model
{
    use HasFactory;

    protected $table = 'message_status';
    protected $guarded = false;
}
