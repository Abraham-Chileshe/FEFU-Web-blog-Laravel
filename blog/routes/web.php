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



//Registration
Route::get('add-user', 'RegistrationController@store');
Route::post('add-user','RegistrationController@store');


Route::get('login-user', 'SessionsController@create');
Route::post('login-user', 'SessionsController@store');
Route::get('logout-user', 'SessionsController@destroy');

Route::get('lang-update', 'DML@lang_update');


Route::get('add-post', 'AddPost@postinsert');
Route::post('add-post','AddPost@postinsert');

Route::get('home', 'AddPost@viewpost');
