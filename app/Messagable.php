<?php

namespace App;

trait Messagable
{
	protected $message;

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
	    // $this->messages()->attach($receiver->id, [
	    //     'body'  => $this->body
	    // ]);
	    
	    return (new Message)->create([
	    	'sender_id'	=> $this->id,
	    	'receiver_id'	=> $receiver->id,
	    	'body'	=> $this->body
	    ]);

	    // send notification
	}

	public function replyTo(Message $message)
	{
		$this->message = $message;
		return $this;
	}

	public function replyBody($body)
	{
		return (new Reply)->create([
			'message_id'	=> $this->message->id,
			'sender_id'	=> $this->id,
			'receiver_id'	=> $this->message->sender_id,
			'body'	=> $body
		]);
	}
}