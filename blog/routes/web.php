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

Route::get('/admin', function () {
    return view('blog.admin');
});




//Registration
Route::get('add-user', 'RegistrationController@store');
Route::post('add-user','RegistrationController@store');


Route::get('login', 'AuthController@loginUser');
Route::post('login', 'AuthController@loginUser');

Route::get('admin-login', 'AdminController@loginAdmin');
Route::post('admin-login', 'AdminController@loginAdmin');

Route::get('logout','AuthController@destroy');
Route::get('lang-update', 'DML@lang_update');




Route::get('add-post', 'AddPost@postinsert');
Route::post('add-post','AddPost@postinsert');

Route::get('delete', 'DML@delete');
Route::get('delete-user', 'DML@delete_user');
Route::get('add-admin', 'DML@add_admin');
Route::get('remove-admin', 'DML@remove_admin');
Route::post('delete', 'DML@delete');

Route::get('add-like', 'AddLike@Like');
Route::post('add-like','AddLike@Like');

Route::get('add-comment', 'AddComment@Comment');
Route::post('add-comment','AddComment@Comment');

Route::get('add-survey', 'AddSurvey@Survey');
Route::post('add-survey','AddSurvey@Survey');



