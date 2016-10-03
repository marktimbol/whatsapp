<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCanViewAllHisMessagesTest extends TestCase
{
	use DatabaseMigrations;

    public function test_an_authenticated_user_can_view_all_his_messages()
    {
    	
    }
}
