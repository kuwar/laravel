<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', 'WelcomeController@index');

Route::get('/upload/csv', function () {
    return view('csv/upload');
});

Route::post('/upload/process', 'UploadController@create');

Route::get('/concat', 'UploadController@_concat_CSV');