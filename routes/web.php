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

Auth::routes();

Route::post('watch/{user}', 'WatchingController@store');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ProfilesController@home')->name('home');


Route::get('/art/create',  'SketchesController@create');
Route::get('/profile/{user}/art/{sketch}', 'SketchesController@show');
Route::post('/art',        'SketchesController@store');



Route::get('/profile/{user}',        'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit',   'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
