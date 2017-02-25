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

Route::get('/', 'SiteController@index');
Route::post('band/{id}/delete', 'BandController@delete');
Route::get('band/{id}/edit', 'BandController@edit');
Route::post('band/{id}/update', 'BandController@update');

Route::get('albums', 'SiteController@albums');

Route::group(['prefix' => 'ajax'], function(){
	Route::get('bands', 'BandController@ajaxGetBands');
	
	
	Route::get('albums', 'AlbumController@ajaxGetAlbums');
});
