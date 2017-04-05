<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@welcome');
Route::get('/memes/{meme}', 'MemeController@show');

Auth::routes();

Route::get('/home', 'MemeController@dashboard');
Route::get('/memes', 'MemeController@index');
Route::get('/memes/{meme}/edit', 'MemeController@edit');
Route::get('/memes/{meme}/del', 'MemeController@destroy');

Route::post('/memes/{meme}/edit', 'MemeController@update');

Route::post('/memes', 'MemeController@store');
