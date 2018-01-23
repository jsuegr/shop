<?php

Route::get('/', 'TestController@welcome');

Auth::routes();



Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

//Actualizar datos de usaurio actual
Route::get('/myaccount/edit', 'MyAccountController@edit'); // formulario edición
Route::post('/myaccount/edit', 'MyAccountController@update'); // actualizar
Route::delete('/myaccount', 'MyAccountController@destroy'); // form eliminar


Route::middleware(['auth', 'admin_provider'])->prefix('admin')->namespace('Admin')
->group(function () {
	Route::get('/products', 'ProductController@index'); // listado
	Route::get('/products/create', 'ProductController@create'); // formulario
	Route::post('/products', 'ProductController@store'); // registrar
	Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario edición
	Route::post('/products/{id}/edit', 'ProductController@update'); // actualizar
	Route::delete('/products/{id}', 'ProductController@destroy'); // form eliminar

	Route::get('/products/{id}/images', 'ImageController@index'); // listado
	Route::post('/products/{id}/images', 'ImageController@store'); // registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy'); // form eliminar	
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // destacar	
});


Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')
->group(function () {
	Route::get('/categories', 'CategoryController@index'); // listado
	Route::get('/categories/create', 'CategoryController@create'); // formulario
	Route::post('/categories', 'CategoryController@store'); // registrar
	Route::get('/categories/{category}/edit', 'CategoryController@edit'); // formulario edición
	Route::post('/categories/{category}/edit', 'CategoryController@update'); // actualizar
	Route::delete('/categories/{category}', 'CategoryController@destroy'); // form eliminar	

	//registro de proveedores
	$this->get('register/provider', 'Auth\RegisterProviderController@showRegistrationProviderForm');
    $this->post('register/provider', 'Auth\RegisterProviderController@registerProvider');

    //registro de administradores
    $this->get('register/admin', 'Auth\RegisterAdminController@showRegistrationProviderForm');
    $this->post('register/admin', 'Auth\RegisterAdminController@registerProvider');

    //Administrar usuarios
    Route::get('/users', 'UsersController@index'); // listado
	Route::get('/users/create', 'UsersController@create'); // formulario
	Route::post('/users', 'UsersController@store'); // registrar
	Route::get('/users/{id}/edit', 'UsersController@edit'); // formulario edición
	Route::post('/users/{id}/edit', 'UsersController@update'); // actualizar
	Route::delete('/users/{id}', 'UsersController@destroy'); // form eliminar

	//buscar usuarios
	Route::get('/users/search', 'SearchUsersController@show');
	Route::get('/users/json', 'SearchUsersController@data');

	
});
// Registration Routes...
    

/*
	// Authentication Routes...
        $this->get('login', 'Auth\AuthController@showLoginForm');
        $this->post('login', 'Auth\AuthController@login');
        $this->get('logout', 'Auth\AuthController@logout');

        

        // Password Reset Routes...
        $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
        $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
        $this->post('password/reset', 'Auth\PasswordController@reset')


        Route::get('/users/{id}/images', 'ImageUserController@index'); // listado
	Route::post('/users/{id}/images', 'ImageUserController@store'); // registrar
	Route::delete('/users/{id}/images', 'ImageUserController@destroy'); // form eliminar	
	Route::get('/users/{id}/images/select/{image}', 'ImageUserController@select'); // destacar
*/

