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


Route::get('peta', 'HomeController@index')->name('peta');
Route::get('apotek', 'ApotekController@index')->name('apotek');
Route::get('tentang', 'HomeController@tentang')->name('tentang');

Route::prefix('administrator')->group(function () {
	Auth::routes();
    Route::resource('apotek', 'ApotekController');
});