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

Route::get('/','AppointmentController@index');
Route::resource('appointment','AppointmentController');
Route::get('/calendar','AppointmentController@calendar');
Route::get('appointment/destroy/{id}','AppointmentController@destroy');
