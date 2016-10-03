<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['message_id', 'sender_id', 'receiver_id', 'body'];
}
