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

// 静态页面相关路由
Route::get('', 'StaticPagesController@home')->name('home');
Route::get('home', 'StaticPagesController@home')->name('home');
Route::get('help', 'StaticPagesController@help')->name('help');
Route::get('about', 'StaticPagesController@about')->name('about');

// 用户资源相关路由
Route::get('signup', 'UsersController@create')->name('signup');
Route::get('users/create', 'UsersController@create')->name('users.create');
Route::post('users/store', 'UsersController@store')->name('users.store');
Route::get('users/{user}', 'UsersController@show')->name('users.show');

// 会话相关路由
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

// 用户激活相关路由
Route::get('signup/user/{id}/activate/{token}', 'UsersController@activate')->name('activate_email');

// 用户重置密码相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');