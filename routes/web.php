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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*Rutas CRUD*/

Route::resource('providers','ProviderController');

Route::resource('users','UserController');

Route::resource('employees','EmployeeController');

Route::resource('roles','RoleController');

Route::resource('clients','ClientController');

Route::resource('sales','SaleController');

Route::resource('products','ProductController');

Route::resource('productSales','ProductSaleController');

Route::resource('productProviders','ProductProviderController');


