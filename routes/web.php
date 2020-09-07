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


Route::get('/', 'PostsController@index');
Route::get('/post{id}', 'PostsController@show');
Route::get('/adding_post', 'PostsController@openAdding');
Route::get('/updating_post{id}','PostsController@openUpdating')->name('updating_post');
Route::post('/add', 'PostsController@add');
Route::post('/update', 'PostsController@update');
Route::get('/destroy{id}', 'PostsController@destroy')->name('destroy');
