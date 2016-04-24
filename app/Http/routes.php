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

Route::get('/', 'PagesController@home');
Route::get('/blog', 'BlogController@home');

Route::get('contact', 'ContactController@compose');
Route::post('contact', 'ContactController@process');
Route::get('contact/sent', 'ContactController@sent');