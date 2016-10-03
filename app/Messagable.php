<?php

namespace App;

trait Messagable
{
	public function messages()
	{
	    return $this->belongsToMany(Message::class, 'messages', 'sender_id', 'receiver_id');
	}

	public function sendMessage($body)
	{
	    $this->body = $body;
	    return $this;
	}

	public function to($receiver)
	{
	    $this->messages()->attach($receiver->id, [
	        'body'  => $this->body
	    ]);

	    // send notification
	}
}