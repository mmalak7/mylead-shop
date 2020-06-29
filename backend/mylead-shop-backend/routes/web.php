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

Route::get('/products', 'ProductController@index');
Route::get('/products/create', 'ProductController@create'); //order means a lot - the first one is more important than the next routes
Route::post('/products', 'ProductController@store');
Route::get('/products/{id}', 'ProductController@show');

Route::get('/products/update/{id}', 'ProductController@showUpdate');
Route::put('/products/update/{id}', 'ProductController@update');

Route::delete('/products/{id}', 'ProductController@destroy');