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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('disccussion', 'DisccussionController');
Route::resource('disccussion/{disccussion}/reply', 'RepliesController');
Route::post('disccussion/{disccussion}/reply/{reply}/mark-best', 'DisccussionController@Reply')->name('disccussion.best-answer');
Route::get('user/notifications' , 'UserController@notifications')->name('user.notifications');