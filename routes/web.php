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
    return redirect('/login');
});

Auth::routes();

Route::resource('todo', 'TodoController');
Route::resource('category', 'CategoryController');
Route::post('todo/{id}/updateStatus','TodoController@updateStatus')->name('updateStatus');
/*Route::middleware(['auth'])->group(function () {
  
    Route::get('/','TodoController@index');
    Route::get('/store','TodoController@store')->name('store');
    Route::get('/edit/{id}','TodoController@edit')->name('edit');
    Route::get('/delete/{id}','TodoController@delete')->name('delete');
    Route::get('/update/{id}','TodoController@update')->name('update');
    Route::get('/updateStatus/{id}','TodoController@updateStatus')->name('updateStatus');
 
 
 
 });
 Auth::routes();*/