<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanSendAMessageToAnotherUserTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_authenticated_user_can_send_a_message_to_another_user()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user);

    	$receiver = factory(App\User::class)->create();

    	$response = $this->post('/api/messages', [
    		'receiver_id'	=> $receiver->id,
    		'body'	=> 'Chat message'
    	]);

    	$this->seeInDatabase('messages', [
    		'sender_id'	=> $user->id,
    		'receiver_id'	=> $receiver->id,
    		'body'	=> 'Chat message',
    	]);
    }
}
