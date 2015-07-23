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

// Get Method
Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'TicketsController@create');
Route::get('/tickets', 'TicketsController@index');
Route::get('/ticket/{slug}', 'TicketsController@show');
Route::get('/ticket/{slug}/edit', 'TicketsController@edit');
Route::get('users/register', 'Auth\AuthController@getRegister');
Route::get('users/logout', 'Auth\AuthController@getLogout');
Route::get('users/login', 'Auth\AuthController@getLogin');

// Post Method
Route::post('/contact', 'TicketsController@store');
Route::post('/ticket/{slug?}/edit', 'TicketsController@update');
Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy');
Route::post('/comment', 'CommentsController@newComment');
Route::post('users/register', 'Auth\AuthController@postRegister');
Route::post('users/login', 'Auth\AuthController@postLogin');
