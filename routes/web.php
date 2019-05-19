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



Route::prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/media','HomeController@media')->name('admin.media');
    Route::resource('/category', 'CategoryController');
    Route::post('/categoryadd', 'CategoryController@category')->name('category.add');
    Route::resource('/product','ProductController');
    Route::get('/transaction','TransactionController@index')->name('transaction.index');
    Route::get('/transaction/{code}/{status}','TransactionController@status');
    Route::get('/transaction/{code}','TransactionController@show');
    Route::get('/transaction/pdf/{code}/cetak','TransactionController@pdf');
});
