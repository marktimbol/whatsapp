<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanReplyToAMessageTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_authenticated_user_can_reply_to_a_users_message()
    {
        $sender = factory(App\User::class)->create();
        $receiver = factory(App\User::class)->create();
        $this->actingAs($sender);

        $message = $sender->sendMessage('Hi')->to($receiver);

        // Reply
        $this->actingAs($receiver);
        $receiver->replyTo($message)->replyBody('Hello');

        $this->seeInDatabase('replies', [
            'message_id'    => $message->id,
            'sender_id' => $receiver->id,
            'receiver_id'   => $sender->id,
            'body'  => 'Hello'
        ]);
    }
}
