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


Route::get('/', 'AnimeController@index')->name('anime.main');

Route::get('/anime-page', 'AnimeController@animePage')->name('anime.page');

Route::get('/anime/create','AnimeController@create');

Route::get('/anime/update','AnimeController@update');

Route::get('/anime/delete','AnimeController@delete');

Route::get('/anime/first_or_create','AnimeController@firstOrCreate');

Route::get('/anime/update_or_create','AnimeController@updateOrCreate');
