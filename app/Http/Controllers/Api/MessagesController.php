<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
    	$receiver = User::findOrFail($request->receiver_id);
    	return auth()->user()->sendMessage($request->body)->to($receiver);
    }
}
