<?php

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

Auth::routes();

Route::get('/', 'IndexController@index'); // show article

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@getUser'); // show user
Route::get('/{id}/delete','HomeController@destroy'); // delete user
