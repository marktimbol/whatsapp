<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	protected $user;

	public function __construct()
	{
		$this->middleware(function ($request, $next) {
		    $this->user = auth()->user();
		    return $next($request);
		});
	}

    public function index()
    {
		if( $this->user ) { return $this->user; }

		return response()->json([
			'error' => 'Unauthorized'
		]);
    }
}
