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
// Route Login
Route::get('/', 'AuthController@index')->name('login.index');
Route::post('/', 'AuthController@validasi')->name('login.validate');
Route::get('/logout', 'AuthController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function () {

    // Route Home
    Route::get('/home', 'HomeController@index')->name('home.index');


    // Route Kelas
    Route::resource('/kelas', 'KelasController')->except(['update', 'show', 'edit', 'destroy']);
    Route::delete('/kelas/{kelas}', 'KelasController@destroy')->name('kelas.destroy');
    Route::put('/kelas/{kelas}', 'KelasController@update')->name('kelas.update');
    Route::get('/kelas/{kelas}/edit', 'KelasController@edit')->name('kelas.edit');
    Route::get('/table/kelas', 'KelasController@dataTable')->name('table.kelas');
});

