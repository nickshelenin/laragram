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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/profiles/{user}', 'ProfileController@index');

Route::get('/profiles/{user}/edit', 'ProfileController@edit');
// Route::get('/profiles/{user}/', 'ProfilesController@update');

// Route::resource('/', 'ProfilesController');

Auth::routes();