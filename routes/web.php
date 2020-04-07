<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'PostController@index');

Route::get('/profiles/{user}', 'ProfileController@index');
Route::get('/profiles/{user}/edit', 'ProfileController@edit');
Route::patch('/profiles/{user}', 'ProfileController@update');

Route::get('/p', 'PostController@index');
Route::get('/p/create', 'PostController@create');
Route::post('/p', 'PostController@store');
Route::get('/p/{post}', 'PostController@show');
Route::delete('/p/{post}', 'PostController@destroy');

Route::post('/follow/{user}', 'FollowController@store');
