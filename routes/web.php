<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function() {
    return view('welcome');
})->middleware('guest');

Route::get('locale/{locale}', function($locale) {
    \Illuminate\Support\Facades\Session::set('locale', $locale);

    return redirect()->back();
});

Auth::routes(); // Naredi laravel php artisan make:auth

Route::group([ 'middleware' => 'auth' ], function() {
    Route::resource('statuses', 'StatusController', [ 'except' => [ 'show' ] ]);
    Route::group([ 'middleware' => 'admin' ], function() {
        Route::get('admin/users', 'AdminController@users');
        Route::get('admin/users/{id}', 'AdminController@user');
    });
});
