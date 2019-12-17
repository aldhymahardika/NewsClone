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

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
	Route::get('/admin.data_user', 'AdminController@data_user');
	Route::get('/admin.tambah', 'AdminController@tambah_akun');
	Route::post('/admin.store', 'AdminController@store');
});

Route::group(['middleware' => ['auth', 'CheckRole:admin,operator,verifikator,user']], function(){
	Route::get('/dashboard', 'AdminController@dashboard');
});

Route::group(['middleware' => ['auth', 'CheckRole:operator']], function(){
	Route::get('/operator.data_doc', 'OperatorController@data_doc');
	Route::get('/operator.tambah_doc', 'OperatorController@tambah_doc');
	Route::post('/operator.store_doc', 'OperatorController@store_doc');
	Route::get('/operator.edit_doc/{id}', 'OperatorController@edit_doc');
	Route::post('/operator.update_doc/{id}', 'OperatorController@update_doc');
});

Route::get('/admin', 'AdminController@index');
