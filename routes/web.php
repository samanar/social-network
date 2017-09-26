<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// profile's routes
Route::get('profile/{slug}', 'ProfileController@index')
    ->name('profile');
