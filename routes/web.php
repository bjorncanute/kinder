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
Route::delete('sketches/{sketch}', 'SketchesController@destroy');



Route::get('/profile/{user}',        'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit',   'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}',      'ProfilesController@update')->name('profile.update');

Route::get('/collections/create',       'CollectionsController@create');
Route::post('/collections',             'CollectionsController@store');
Route::get('/collections/{collection}', 'CollectionsController@show');
Route::post('/collections/{collection}/add/',        'CollectionsController@add_sketch');
// Route::post('/collections/removeSketch/{collection}/{sketch}/',   'CollectionsController@removeSketch');
Route::post('/collections/removeSketch',   'CollectionsController@removeSketch');


Route::patch('/collections/copySketch/{collection}/{sketch}/',   'CollectionsController@copySketch');

Route::post('/collections/{src}/{dst}/moveSketch',               'CollectionsController@moveSketch');
Route::patch('/collections/updateAll',    'CollectionsController@updateAll');


Route::get('/{username}/gallery/{collection?}',        'GalleryController@show')->name('gallery.show');
Route::get('/{username}/gallery/{collection}/edit',    'GalleryController@edit')->name('gallery.edit');



// vue json routes
Route::get('collections_json', 'CollectionsController@get');
Route::get('sketches_json', 'CollectionsController@getSketches');
Route::get('/collections/addToCollection', 'CollectionsController@addToCollection');


Route::get('/bob', 'CollectionsController@addToCollection');
Route::post('/addToCollection', 'CollectionsController@addToCollection');