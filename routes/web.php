<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\orderHistoryController;

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
//     return view('welcome');
// });

// Frontend Web Route 


Route::get('/', 'App\Http\Controllers\Frontend\pageController@home')->name('home');
Route::get('/shop', 'App\Http\Controllers\Frontend\pageController@shop')->name('shop');
Route::get('/product-details/{slug}' , "App\Http\Controllers\Frontend\pageController@productdetails")->name('product-details');

// primary category and sub Category wish product display
Route::get('/primary_category/{slug}' , 'App\Http\Controllers\Frontend\pageController@primaryCategory_wish_product')->name('primary-category-wish');

Route::get('/category/{slug}' , 'App\Http\Controllers\Frontend\pageController@subCategory_wish_product')->name('category-wish-product');

// search Result Route
Route::post('/search_result', 'App\Http\Controllers\Frontend\pageController@search')->name('search');

// Product Card Route Group
Route::group(['prefix' => 'card'], function(){
    Route::get('/' , "App\Http\Controllers\Frontend\cardController@index")->name('card.items');
    Route::post('/store' , "App\Http\Controllers\Frontend\cardController@store")->name('card.store');
    Route::post('/update/{id}' , "App\Http\Controllers\Frontend\cardController@update")->name('card.update');
    Route::post('/destroy/{id}' , "App\Http\Controllers\Frontend\cardController@destroy")->name('card.destroy');
});
Route::get('/checkout' , "App\Http\Controllers\Frontend\pageController@checkout")->name('checkout');

Route::get('/customer-login' , "App\Http\Controllers\Frontend\pageController@login")->name('customer-sinin');


Route::group( ['prefix' => 'customer'] , function(){
    // user Profile route
    Route::get('/my-profile' , 'App\Http\Controllers\Frontend\customerController@index')->name('customer-profile')->middleware('auth' , 'verified');

    Route::get('/update_profile/{id}' , 'App\Http\Controllers\Frontend\customerController@edit')->name('customer-profile.edit')->middleware('auth' , 'verified');

    Route::post('/profile_update/{id}' , 'App\Http\Controllers\Frontend\customerController@update')->name('customer-profile.update')->middleware('auth' , 'verified');

    // order management route 
    Route::get('/order_history' , [orderHistoryController::class , 'index'] )->name('orderhistory');




});









// Backend Web Route Group 

// admin Group Route 
Route::group( ['prefix' => 'admin'] , function(){

    // Admin Dashboard Route page
    Route::get('/dashboard' , 'App\Http\Controllers\Backend\PageController@dashboard')->middleware('auth', 'verified','role')->name('admin.dashboard');

    // Brand Route Group
    Route::group( ['prefix' => '/brand'] , function(){
        Route::get('/manage' , 'App\Http\Controllers\Backend\brandController@index')->middleware('auth','role')->name('brand.index');
        Route::get('/create' , 'App\Http\Controllers\Backend\brandController@create')->middleware('auth', 'verified','role')->name('brand.create');
        Route::post('/store' , 'App\Http\Controllers\Backend\brandController@store')->middleware('auth', 'verified','role', 'verified','role')->name('brand.store');
        Route::get('/edit/{id}' , 'App\Http\Controllers\Backend\brandController@edit')->middleware('auth', 'verified','role', 'verified','role')->name('brand.edit');
        Route::post('/update/{id}' , 'App\Http\Controllers\Backend\brandController@update')->middleware('auth', 'verified','role', 'verified','role')->name('brand.update');
        Route::post('/destroy/{id}' , 'App\Http\Controllers\Backend\brandController@destroy')->middleware('auth', 'verified','role', 'verified','role')->name('brand.destroy');
    });

    //Category Group
    Route::group( ['prefix' => '/category'] , function(){
        Route::get('/manage' , 'App\Http\Controllers\Backend\CategoryController@index')->middleware('auth', 'verified','role', 'verified','role')->name('category.index');
        Route::get('/create' , 'App\Http\Controllers\Backend\CategoryController@create')->middleware('auth', 'verified','role', 'verified','role')->name('category.create');
        Route::post('/store' , 'App\Http\Controllers\Backend\CategoryController@store')->middleware('auth', 'verified','role', 'verified','role')->name('category.store');
        Route::get('/edit/{id}' , 'App\Http\Controllers\Backend\CategoryController@edit')->middleware('auth', 'verified','role', 'verified','role')->name('category.edit');
        Route::post('/update/{id}' , 'App\Http\Controllers\Backend\CategoryController@update')->middleware('auth', 'verified','role', 'verified','role')->name('category.update');
        Route::post('/destroy/{id}' , 'App\Http\Controllers\Backend\CategoryController@destroy')->middleware('auth', 'verified','role', 'verified','role')->name('category.destroy');
    });

    // Division Group
    Route::group( ['prefix' => '/division'] , function(){
        Route::get('/manage' , 'App\Http\Controllers\Backend\divisionController@index')->middleware('auth', 'verified','role')->name('division.index');
        Route::get('/create' , 'App\Http\Controllers\Backend\divisionController@create')->middleware('auth', 'verified','role')->name('division.create');
        Route::post('/store' , 'App\Http\Controllers\Backend\divisionController@store')->middleware('auth', 'verified','role')->name('division.store');
        Route::get('/edit/{id}' , 'App\Http\Controllers\Backend\divisionController@edit')->middleware('auth', 'verified','role')->name('division.edit');
        Route::post('/update/{id}' , 'App\Http\Controllers\Backend\divisionController@update')->middleware('auth', 'verified','role')->name('division.update');
        Route::post('/destroy/{id}' , 'App\Http\Controllers\Backend\divisionController@destroy')->middleware('auth', 'verified','role')->name('division.destroy');
    });

    // District Group
    Route::group( ['prefix' => '/district'] , function(){
        Route::get('/manage' , 'App\Http\Controllers\Backend\districtController@index')->middleware('auth', 'verified','role')->name('district.index');
        Route::get('/create' , 'App\Http\Controllers\Backend\districtController@create')->middleware('auth', 'verified','role')->name('district.create');
        Route::post('/store' , 'App\Http\Controllers\Backend\districtController@store')->middleware('auth', 'verified','role')->name('district.store');
        Route::get('/edit/{id}' , 'App\Http\Controllers\Backend\districtController@edit')->middleware('auth', 'verified','role')->name('district.edit');
        Route::post('/update/{id}' , 'App\Http\Controllers\Backend\districtController@update')->middleware('auth', 'verified','role')->name('district.update');
        Route::post('/destroy/{id}' , 'App\Http\Controllers\Backend\districtController@destroy')->middleware('auth', 'verified','role')->name('district.destroy');
    });

    // Cuntry Route Group
    Route::group( ['prefix' => '/cuntry'] , function(){
        Route::get('/manage' , 'App\Http\Controllers\Backend\cuntryController@index')->middleware('auth', 'verified','role')->name('cuntry.index');
        Route::get('/create' , 'App\Http\Controllers\Backend\cuntryController@create')->middleware('auth', 'verified','role')->name('cuntry.create');
        Route::post('/store' , 'App\Http\Controllers\Backend\cuntryController@store')->middleware('auth', 'verified','role')->name('cuntry.store');
        Route::get('/edit/{id}' , 'App\Http\Controllers\Backend\cuntryController@edit')->middleware('auth', 'verified','role')->name('cuntry.edit');
        Route::post('/update/{id}' , 'App\Http\Controllers\Backend\cuntryController@update')->middleware('auth', 'verified','role')->name('cuntry.update');
        Route::post('/destroy/{id}' , 'App\Http\Controllers\Backend\cuntryController@destroy')->middleware('auth', 'verified','role')->name('cuntry.destroy');
    });

    // Products Group
    Route::group( ['prefix' => '/product'] , function(){
        Route::get('/manage' , 'App\Http\Controllers\Backend\productController@index')->middleware('auth', 'verified','role')->name('product.index');
        Route::get('/create' , 'App\Http\Controllers\Backend\productController@create')->middleware('auth', 'verified','role')->name('product.create');
        Route::post('/store' , 'App\Http\Controllers\Backend\productController@store')->middleware('auth', 'verified','role')->name('product.store');
        Route::get('/edit/{id}' , 'App\Http\Controllers\Backend\productController@edit')->middleware('auth', 'verified','role')->name('product.edit');
        Route::post('/update/{id}' , 'App\Http\Controllers\Backend\productController@update')->middleware('auth', 'verified','role')->name('product.update');
        Route::post('/destroy/{id}' , 'App\Http\Controllers\Backend\productController@destroy')->middleware('auth', 'verified','role')->name('product.destroy');
    });

});





require __DIR__.'/auth.php';