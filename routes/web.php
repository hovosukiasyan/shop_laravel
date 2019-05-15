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

//User Part

Route::get('/profile', 'UserController@index');
Route::patch('/profile', 'UserController@update');

//Admin Part

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/admin', 'AdminController@index');
    Route::get('/profile', 'AdminController@profile');

    //Products
    Route::get('/product/create', 'ProductController@create');
    Route::post('/product/', 'ProductController@store');

    Route::get('/products','ProductController@show');
    Route::get('/my-posts/edit/{post}','ProductController@edit');
    Route::patch('/post/{post}','ProductController@update');
    Route::delete('/post/{post}','ProductController@destroy');


});
