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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/add_worker', 'HomeController@add_worker')->name('add_worker');

Route::get('/workers_db', 'HomeController@workers_db')->name('workers_db');

Route::get('/ajax', 'HomeController@ajax')->name('ajax');

Route::get('/edit{id}', 'HomeController@edit')->name('edit');

Route::post('/edit_worker', 'HomeController@edit_worker')->name('edit_worker');

Route::get('/delete_worker{id}', 'HomeController@delete_worker')->name('delete_worker');
