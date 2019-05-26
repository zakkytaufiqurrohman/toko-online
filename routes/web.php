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

// Route::get('/', function () {
//     // return view('welcome');

// });
// Route::get('/','front@index');
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
    // user
    Route::get('/user','UserController@index')->name('user.index');
    Route::get('/user/{id}','UserController@status');
    Route::get('/create','UserController@create')->name('user.create');
    Route::post('user/store','UserController@store')->name('user.store');
    Route::get('user/edit/{id}','UserController@edit')->name('user.edit');
    Route::patch('user/update/{id}','UserController@update')->name('user.update');
    Route::delete('user/delete/{id}','UserController@delete')->name('user.delete');

});
//
Route::get('/','Home\HomePageController@index')->name('home');
Route::get('/product','Home\HomePageController@product')->name('product');
Route::get('/product/{slug}','Home\HomePageController@category')->name('product.category');
Route::get('/product/detail/{slug}','Home\HomePageController@detail')->name('product.detail.category');

