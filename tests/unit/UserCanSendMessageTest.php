<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanSendMessageTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_user_can_send_a_message()
    {
    	$user = factory(App\User::class)->create();
    	$receiver = factory(App\User::class)->create();
    	$this->actingAs($user);

    	$user->sendMessage('Message body')->to($receiver);

    	$this->seeInDatabase('messages', [
    		'sender_id'	=> $user->id,
    		'receiver_id'	=> $receiver->id,
    		'body'	=> 'Message body'
    	]);
    }
}
