<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api', 'as' => 'api.'], function() {
	Route::get('/user', ['as' => 'user', 'uses' => 'Api\UsersController@index']);

	Route::resource('/messages', 'Api\MessagesController', [
		'only'	=> ['index', 'store']
	]);

	Route::resource('/messages.replies', 'Api\RepliesController', [
		'only'	=> ['store']
	]);
});
