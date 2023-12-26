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

Route::get('/', function () {
    return view('blog.home');
});


Route::get('/post', function () {
    return view('blog.view_post');
});




//Registration
Route::get('add-user', 'RegistrationController@store');
Route::post('add-user','RegistrationController@store');


Route::get('login', 'AuthController@loginUser');
Route::post('login', 'AuthController@loginUser');

Route::get('logout','AuthController@destroy');
Route::get('lang-update', 'DML@lang_update');
Route::post('agreement', 'DML@agree');



Route::get('add-post', 'AddPost@postinsert');
Route::post('add-post','AddPost@postinsert');

Route::get('add-like', 'AddLike@Like');
Route::post('add-like','AddLike@Like');

Route::get('add-comment', 'AddComment@Comment');
Route::post('add-comment','AddComment@Comment');



