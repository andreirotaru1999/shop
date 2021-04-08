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
Route::get('/item/create', 'itemsController@create');
Route::post('/item/create','itemsController@store');
Route::get('/item/{item}/edit', 'itemsController@edit');
Route::patch('/item/{item}/update','itemsController@update')->name('item.update');
Route::delete('/item/{item}/delete','itemsController@delete')->name('item.delete');
Route::put('/item/{item}/select','itemsController@select')->name('item.select');
Route::delete('/item/{item}/deselect','itemsController@deselect')->name('item.deselect');
Route::get('/item', 'itemsController@search')->name('item.index');
Route::get('/item/OrderBy', 'itemsController@index')->name('item.OrderBy');


Route::get('/', function () {
    return view('welcome');
});
