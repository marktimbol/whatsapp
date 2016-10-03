<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'body'];

    public function replies()
    {
    	return $this->hasMany(Reply::class);
    }
}
