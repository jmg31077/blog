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

	Route::get('categorias', function(){
		$categorias = App\Categoria::all();

		return view('categorias.index', compact('categorias'));
	});

	Route::get('categorias/create', function(){
		return view('categorias.create');
	});

	Route::get('categorias/{categoria}/edit', function($id){
		$categoria = App\Categoria::findOrFail($id);

		return view('categorias.edit', compact('categoria'));
	});

	Route::get('categorias/{categoria}', function($id){
		$categoria = App\Categoria::findOrFail($id);

		return view('categorias.show', compact('categoria'));
	});
	
});

Route::get('/noticias/{noticia}', 'NoticiaController@show')->name('noticias.show');

