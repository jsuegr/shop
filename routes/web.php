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



Route::get('/', 'TestController@welcome'); 
Auth::routes();

Route::get('/search','SearchController@show');//mostrar resultados de busqueda de productos
Route::get('/products/json','SearchController@data');//mostrar products en json para sugerencia de busqueda

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');//show info product
Route::get('/categories/{category}', 'CategoryController@show');



Route::post('/cart', 'CartDetailController@store');//save product  into cart
Route::delete('/cart', 'CartDetailController@destroy');//show info product

Route::post('/order', 'CartController@store');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){
	Route::get('/products', 'ProductController@index'); //listado
	Route::get('/product/create', 'ProductController@create'); //formulario
	Route::post('/products', 'ProductController@store'); //registrar bd
	Route::get('/products/{id}/edit', 'ProductController@store'); //formulario edicion
	Route::post('/products/{id}/edit', 'ProductController@store'); //actualizar
	Route::delete('/products/{id}', 'ProductController@destroy'); //eliminar

	Route::get('/product/{id}/images', 'ImageController@index');//listado
	Route::post('/product/{id}/images', 'ImageController@store');//registrar
	Route::delete('/product/{id}/images', 'ImageController@destroy');// eliminar
	Route::get('/product/{idproduct}/images/select/{idimage}', 'ImageController@select');//select


	Route::get('/categories', 'CategoryController@index'); //listado
	Route::get('/product/create', 'CategoryController@create'); //formulario
	Route::post('/categories', 'CategoryController@store'); //registrar bd
	Route::get('/categories/{category}/edit', 'CategoryController@store'); //formulario edicion
	Route::post('/categories/{category}/edit', 'CategoryController@store'); //actualizar
	Route::delete('/categories/{category}', 'CategoryController@destroy'); //eliminar

});