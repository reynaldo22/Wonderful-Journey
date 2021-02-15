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

Route::get('/', 'IndexController@index'); // show articl
Route::get('/{id}/category','IndexController@show'); // show category
Route::get('/{id}/detail','IndexController@detail'); // show detail

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@getUser'); // show user
Route::get('/{id}/delete','HomeController@destroy'); // delete user
Route::get('/{id}/edit','IndexController@edit'); // edit profil user
Route::post('/{id}/update','IndexController@update'); // update profil user
Route::get('/{id}/article','IndexController@article'); // edit profil article
Route::get('/{id}/delete','IndexController@destroy'); // delete article
Route::get('/create', 'IndexController@create'); // show user
Route::post('/create', 'IndexController@store'); // show user