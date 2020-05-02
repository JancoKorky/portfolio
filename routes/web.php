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
    return view('master');
});

Route::get('about', function (){
    return view('about');
});

Route::get('contact', function (){
    return view('contact');
});


Route::get('auth/login', function () {
    return 'login';
});

Route::get('auth/register', function () {
    return 'register';
});

Route::resource('user', 'UserController');
