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
//user frond end
Route::get('/','Home\HomePageController@index')->name('home');
Route::get('/product','Home\HomePageController@product')->name('product');
Route::get('/product/{slug}','Home\HomePageController@category')->name('product.category');
Route::get('/product/detail/{slug}','Home\HomePageController@detail')->name('product.detail.category');
Route::get('/supliyer','Home\HomePageController@supliyer')->name('supliyer');
Route::get('/supliyer/detail/{id}','Home\HomePageController@detailSupliyer')->name('supliyer.detail');
Route::get('/auth/register','Home\HomePageController@register')->name('auth.register');
Route::post('/auth/store','Home\HomePageController@store')->name('auth.store');
Route::get('/verifikasi/{token}','Home\HomePageController@verifikasi')->name('verifikasi');
Route::post('/auth/login','Home\HomePageController@login')->name('auth.login');
// add to cart
Route::post('addcart','Home\CartController@index')->name('cart.index');
Route::get('keranjang','Home\CartController@keranjang')->name('cart.keranjang');
Route::get('/update/{data}','Home\CartController@update')->name('cart.update');
Route::get('/delete/{data}','Home\CartController@delete')->name('cart.delete');
Route::get('/form_pesanan','Home\CartController@form')->name('cart.form');
Route::get('idkota/{data}',function($data){
   return city($data);
});
Route::get('/ongkir/{data}','Home\CartController@ongkir')->name('cart.ongkir');
Route::post('transaction','Home\CartController@transaction')->name('transaction');

