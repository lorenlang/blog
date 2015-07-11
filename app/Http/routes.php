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


//Route::get('posts', 'PostController@index');
//Route::get('posts/create', 'PostController@create');
//Route::get('posts/{id}', 'PostController@show');
//Route::post('posts', 'PostController@store');

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