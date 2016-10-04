<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanSendAMessageToAnotherUserTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_authenticated_user_can_send_a_message_to_another_user()
    {
    	$sender = factory(App\User::class)->create();
    	$this->actingAs($sender);

    	$receiver = factory(App\User::class)->create();

    	$this->post('/api/messages', [
            'api_token' => $sender->api_token,
    		'receiver_id'	=> $receiver->id,
    		'body'	=> 'Chat message'
    	]);

    	$this->seeInDatabase('messages', [
    		'sender_id'	=> $sender->id,
    		'receiver_id'	=> $receiver->id,
    		'body'	=> 'Chat message',
    	]);
    }
}
