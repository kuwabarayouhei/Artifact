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

Route::get('/', 'Theft_carController@index');
Route::get('/theft_cars/create', 'Theft_carController@create');
Route::get('/theft_cars/{theft_car}', 'Theft_carController@show');
Route::post('/theft_cars/{theft_car}', 'CommentController@store');
Route::post('/theft_cars', 'Theft_carController@store');
Route::delete('/theft_cars/{theft_car}', 'Theft_carController@delete');