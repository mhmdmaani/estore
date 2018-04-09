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
Route::resource('/products','ProductsController');
Route::resource('/currs','CurrsController');
Route::resource('/categories','CategoriesController');
Route::resource('/places','PlacesController');
Route::resource('/media','MediaController');
Route::post('/products/searchbyid','ProductsController@searchbyid')->middleware(auth::class); 
Route::post('/products/searchbyname','ProductsController@searchbyname')->middleware(auth::class); 
Route::post('/products/xsearch','ProductsController@xsearch')->middleware(auth::class); 
Route::get('/product/{id}/disapprove','ProductsController@disapprove');
Route::get('/product/{id}/approve','ProductsController@approve');
Route::post('/sendSms','MessagesController@sendSms');
