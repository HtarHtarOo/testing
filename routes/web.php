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

Route::get('/','PageController@mainfun')->name('mainpage') ;

Route::get('brand','PageController@brandfun')->name('brandpage'); 

Route::get('itemdetail','PageController@itemdetailfun')->name('itemdetailpage'); 

Route::get('loginform','PageController@loginfun')->name('loginpage');

Route::get('promotion','PageController@promotionfun')->name('promotionpage');

Route::get('register','PageController@registerfun')->name('registerpage');

Route::get('shoppingcart','PageController@shoppingcartfun')->name('shoppingcartpage');

Route::get('subcategory','PageController@subcategoryfun')->name('subcategorypage');



Route::middleware('role:Admin')->group(function(){
Route::get('dashboard','BackendController@dashboardfun')->name('dashboard');

Route::resource('items','ItemController');

Route::resource('brands','BrandController');

Route::resource('subcategories','SubcategoryController');

Route::resource('categories','CategoryController');

});



Route::resource('orders','OrderController');

Route::resource('order_detail','OrderdetailController');

// Route::get('create','BackendController@itemsfun')->name('create');

// Route::get('index','BackendController@indexfun')->name('index');



// 	Route::get('dashboard','BackendController@dashboardfun')
// })


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
