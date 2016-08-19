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
/*Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('{title}', 'ToursController@show');
Route::post('{title}/photos', ['as' => 'store_photo_path', 'uses' => 'ToursController@addPhoto']);*/

Route::resource('tours', 'ToursController');
