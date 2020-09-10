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

Route::post('watch/{user}',                            'WatchingController@store');

Route::get('/art/create',                              'SketchesController@create');
Route::get('/profile/{user}/art/{sketch}',             'SketchesController@show');
Route::post('/art',                                    'SketchesController@store');
Route::delete('sketches/{sketch}',                     'SketchesController@destroy');

Route::get('/home',                                    'ProfilesController@home')->name('home');

Route::get('/profile/{user}',                          'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit',                     'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}',                        'ProfilesController@update')->name('profile.update');

Route::get('/collections/create',                      'CollectionsController@create');
Route::post('/collections',                            'CollectionsController@store');
Route::get('/collections/{collection}',                'CollectionsController@show');

Route::get('/{username}/gallery/{collection_id?}',     'GalleryController@show')->name('gallery.show');
Route::get('/{username}/gallery/{collection}/edit',    'GalleryController@edit')->name('gallery.edit');

// Vue sketch JSON routes
Route::get('/get_collections_json',                    'CollectionsController@getCollectionsJSON');
Route::get('/get_sketches_json',                       'CollectionsController@getSketchesJSON');
// Vue sketch actions         
Route::post('/addToCollection',                        'CollectionsController@addToCollection');
Route::post('/removeSketchFromCollection/',            'CollectionsController@removeSketchFromCollection');
Route::post('copySketchToCollection',                  'CollectionsController@copySketchToCollection');
Route::post('moveSketchToCollection',                  'CollectionsController@moveSketchToCollection');
Route::patch('/updateAllSketches',                     'CollectionsController@updateAll');

// Route::get('collections_json', 'CollectionsController@get');
// Route::get('sketches_json', 'CollectionsController@getSketches');
// Route::get('/collections/addToCollection', 'CollectionsController@addToCollection');

// Route::patch('/collections/copySketch/{collection}/{sketch}/',   'CollectionsController@copySketch');
// Route::post('/collections/{src}/{dst}/moveSketch',               'CollectionsController@moveSketch');
// Route::post('/collections/removeSketch',   'CollectionsController@removeSketch');

Route::get('/cover_image/{user}', 'GalleryController@returnCoverImage');