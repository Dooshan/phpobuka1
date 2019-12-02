<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('threads', 'ThreadsController@index');
Route::get('threads/create', 'ThreadsController@create');


Route::get('threads/{category}/{thread}', 'ThreadsController@show');
Route::get('threads/{category}/{thread}/edit', 'ThreadsController@edit');
Route::put('threads/{category}/{thread}', 'ThreadsController@update');
Route::delete('threads/{category}/{thread}', 'ThreadsController@destroy');
Route::post('threads', 'ThreadsController@store');
Route::get('threads/{category}', 'ThreadsController@index');


Route::post('/threads/{category}/{thread}/replies', 'RepliesController@store');

Route::get('profiles', 'ProfilesController@index');
Route::get('profiles/{user}', 'ProfilesController@show');
Route::post('profiles/{user}', 'ProfilesController@avatar');

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
