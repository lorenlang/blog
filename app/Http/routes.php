<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PostController@index');


Route::resource('posts', 'PostController');


Route::get('admin', 'AdminController@index');


Route::get('about', 'PageController@about');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::any('share/{id}/{service}', function($id, $service) {
    $post = \App\Post::findOrFail($id);
//    dd($id, $service);
});


Route::get('feed', ['as' => 'rss', 'uses' => 'FeedController@feed']);


Route::get('home', function () {
	return redirect('/');
});
