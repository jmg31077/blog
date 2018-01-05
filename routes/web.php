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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'NoticiaController@publicIndex');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/', 'HomeController@index')->name('dashboard');

	Route::resource('noticias', 'NoticiaController', ['except' => ['show']]);

	Route::resource('categorias', 'CategoriaController');
	
});

Route::get('/noticias/{noticia}', 'NoticiaController@show')->name('noticias.show');

Route::get('categorias/{categoria}/related_news', 'CategoriaController@getRelatedNews')->name('categorias.related_news');
