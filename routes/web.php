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

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/dashboard', 'AdminController@dashboard');
	Route::get('/data_user', 'AdminController@data_user');
	Route::get('/tambah', 'AdminController@tambah_akun');
	Route::post('/store', 'AdminController@store');
});

Route::get('/admin', 'AdminController@index');
