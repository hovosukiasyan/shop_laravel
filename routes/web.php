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


Route::group(['middleware' => ['auth']], function()
{
    Route::get('/profile', 'UserController@index');
    Route::patch('/profile', 'UserController@update');
    
    Route::get('/shop', 'ShopController@index');
    Route::get('/cart', 'ShopController@cart');
 
    Route::get('add-to-cart/{id}', 'ShopController@addToCart');

	
    Route::patch('update-cart', 'ShopController@update');
 
    Route::delete('remove-from-cart', 'ShopController@remove');
});



//Admin Part

Route::group(['middleware' => ['admin']], function(){
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin-profile', 'AdminController@profile');

    //Products
    Route::get('/products/create', 'ProductController@create');
    Route::post('/products/', 'ProductController@store');
    Route::get('/products','ProductController@allProducts');
    Route::get('/products/edit/{product}','ProductController@edit');
    Route::get('/products/show/{product}','ProductController@show');
    Route::patch('/products/{product}','ProductController@update');
    Route::delete('/products/{product}','ProductController@destroy');


    //Phone

    Route::resource('phones', 'PhoneController');
    


    //Notebook

    Route::resource('notebooks', 'NotebookController');


    //Tablet

    Route::resource('tablets', 'TabletController');


    //Brands

    Route::resource('brands', 'BrandController');    







    Route::post('/crop', 'AdminController@crop');

});
