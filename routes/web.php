<?php

use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\SearchController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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
    return view('home');
});

//Route::get('about', function (){
//    return view('about');
//});
//
//Route::get('contact', function (){
//    return view('contact');
//});

Route::get('/home/action', 'HomeController@action')->name('home.action');

Route::resource('user', 'UserController')->only(['edit','update','show']);
Route::resource('user.album', 'AlbumController')->only(['index','edit','update','show']);
Route::resource('user.category', 'CategoryController')->only(['create','edit','update','show','store']);
/*Route::get('user/{user}/album/category/{category}', 'CategoryController@show')->name('album.category.show');
Route::get('user/{user}/album/category/{category}/edit', 'CategoryController@edit')->name('album.category.edit');
Route::put('user/{user}/album/category/{category}', 'CategoryController@update')->name('album.category.update');
Route::get('user/{user}/album/category/create', 'CategoryController@create')->name('album.category.create');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
