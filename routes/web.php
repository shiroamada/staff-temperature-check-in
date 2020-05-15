<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','LogController@create')->name('log.create');

Route::get('/log','LogController@index')->name('log.index');
Route::post('/log','LogController@store')->name('log.store');
Route::get('/log-ajax','LogController@ajax')->name('log.ajax');
Route::get('/log/{id}','LogController@edit')->name('log.edit');
Route::patch('/log/{id}','LogController@update')->name('log.update');
Route::get('/log/delete/{id}','LogController@destroy')->name('log.destroy');

//report
Route::get('/report','ReportController@index')->name('report.index');
Route::post('/report','ReportController@export')->name('report.export');

//staff
Route::get('/staff','StaffController@create')->name('staff.create');
Route::post('/staff','StaffController@store')->name('staff.store');
