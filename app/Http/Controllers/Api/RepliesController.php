<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Message;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
	protected $user;

	public function __construct()
	{
		$this->middleware(function($request, $next) {
			$this->user = auth()->user();
			return $next($request);
		});
	}

    public function store(Request $request, Message $message)
    {
    	return $this->user->replyTo($message)->replyBody($request->body);
    }
}
