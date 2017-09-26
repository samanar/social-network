<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// profile's routes
Route::get('profile/_edit', 'ProfileController@edit')
    ->name('profile.edit');
Route::post('profile/_edit', 'ProfileController@update')
    ->name('profile.update');
Route::get('profile/{slug}', 'ProfileController@index')
    ->name('profile');