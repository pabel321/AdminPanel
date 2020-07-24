<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/insertPost','PostController@insertPost');
Route::get('allPost','PostController@allPost')->name('allPost');
Route::get('deletePost/{id}','PostController@deletePost');
Route::get('editPost/{id}','PostController@editPost');
Route::post('updatePost/{id}','PostController@updatePost');
Route::get('viewPost/{id}','PostController@viewPost');
Route::get('passwordChange','HomeController@passwordChange')->name('passwordChange');
Route::post('updatePassword','HomeController@updatePassword');
Route::get('addNews','PostController@addNews')->name('addNews');
Route::post('insertNews','PostController@insertNews');
Route::get('allNews','PostController@allNews')->name('allNews');