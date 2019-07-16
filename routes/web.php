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

Route::get('/','routeController@index')->name('index');

Route::post('/sendMail','routeController@sendMail')->name('sendMail');

Route::get('/success','routeController@success')->name('success');

Route::get('/download/{filename}','routeController@download')->name('download');
