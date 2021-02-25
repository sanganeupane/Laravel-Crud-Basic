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

Route::get('/','crudcontroller@index')->name('index') ;
Route::post('/','crudcontroller@insert')->name('insert') ;
Route::get('delete/{criteria?}', 'crudcontroller@delete')->name('delete');
Route::get('edit/{criteria?}', 'crudcontroller@edit')->name('edit');
Route::any('edit-Action', 'crudcontroller@editAction')->name('edit-Action');

