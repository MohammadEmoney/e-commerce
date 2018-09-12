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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/home', function () {
    $posts = App\Post::all();
    return view('home', compact('posts'));
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('/admin/products', function (){
       return view('ecom.index');
    });
});

Route::get('/' , 'ProductController@index')->name('home');
Route::get('/category' , 'CategoryController@index');
Route::get('/category/{id}' , 'CategoryController@show')->name('show-category');
Route::get('/page/{id}' , 'ProductController@show')->name('show-page');
Route::post('/page/{id}' , 'ProductController@store')->name('comment');
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
Route::get('/thankyou' , 'ConfirmationController@index')->name('Confirmation');
Route::post('/thankyou' , 'ConfirmationController@store')->name('Confirmation.email');
Route::get('/search', 'HomeController@search')->name('search');


Route::get('/elastic', function(){
	// $client = new Elasticsearch\ClientBuilder::create()->build();
	
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
