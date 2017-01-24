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

Route::get('/', function () {
    return view('welcome');
});

 // Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

// Registration Routes...
Route::get('register-sales-rep', 'Auth\RegisterController@showSalesRepRegistrationForm');
Route::get('register-admin', 'Auth\RegisterController@showAdminRegistrationForm');

Route::post('register-sales-rep', 'Auth\RegisterController@registerSalesRep');
Route::post('register-admin', 'Auth\RegisterController@registerAdmin');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index');
Route::group(['middleware'=>'auth'], function () {
    Route::resource('users', 'UserController');
    Route::resource('contacts', 'ContactController');
});