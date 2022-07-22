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

// Index
Route::get("/allFiles", 'FileController@index')->name("file.index");

// Create
Route::get("/file/create", 'FileController@create')->name("file.create");

// Store
Route::post("/file/create", 'FileController@store')->name("file.store");

// Edit
Route::get("/file/edit/{id}", 'FileController@edit')->name("file.edit");

// Update
Route::post("/file/edit/{id}", 'FileController@update')->name("file.update");

// Show
Route::get("/file/show/{id}", 'FileController@show')->name("file.show");

// Destroy
Route::get("/file/delete/{id}", 'FileController@destroy')->name("file.destroy");

// Download
Route::get("/file/download/{id}", 'FileController@download')->name("file.download");









