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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route for creating or placing a bid
Route::post('/create', 'BidController@store');

//route for adding a product

Route::post('/add', 'ProductsController@store');


Route::put('products/update', 'ProductsController@update');

//route for deleting a product
Route::delete('products/destroy', 'ProductsController@destroy');

//Routing to the Products Controller 

Route::resource('products', 'ProductsController');


Route::resource('product_list', 'HomeController');

Route::resource('products', 'HomeController');

Route::resource('products', 'ProductsController');

Route::resource('average', 'ProductsController');

//Route::resource('bids', 'ProductsController');


Route::get('/create', 'BidController@store')->name('create');


Route::get('/create', 'ProductsController@store')->name('add');


Route::get('/update', 'ProductsController@update')->name('edit');

Route::get('/destroy', 'ProductsController@destroy')->name('delete');

