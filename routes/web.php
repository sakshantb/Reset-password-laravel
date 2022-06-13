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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/forget-password', 'App\Http\Controllers\ForgotPasswordController@getEmail');
Route::post('/forget-password', 'App\Http\Controllers\ForgotPasswordController@postEmail');

Route::get('/reset-password/{token}', 'App\Http\Controllers\ResetPasswordController@getPassword');
Route::post('/reset-password', 'App\Http\Controllers\ResetPasswordController@updatePassword');