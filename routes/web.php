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
//frontend route.....
Route::get('/','HomeController@index');







//Backend route........................

Route::get('/admin','AdminController@index');
Route::get('/dashbord','SuperAdminController@index');
Route::post('/admin-dashbord','AdminController@dashbord');
Route::get('/logout','SuperAdminController@logout');

//category route

Route::get('/add_cat','CategoryController@index');
Route::get('/all_cat','CategoryController@all_category');
Route::post('/save_category','CategoryController@save_category');
Route::get('/unactive_category/{cat_id}','CategoryController@unactive');
Route::get('/active_category/{cat_id}','CategoryController@cat_actice');
Route::get('/edit_cat/{cat_id}','CategoryController@edit_cat');
Route::post('/update_category/{cat_id}','CategoryController@update_category');
Route::get('delete_cat/{cat_id}','CategoryController@delete_cat');

//brand route
Route::get('/add_brand','BrandController@add_brand');
Route::post('/save_brand','BrandController@save_brand');
Route::get('/all_brand','BrandController@all_brand');
Route::get('/unactive_brand/{brand_id}','BrandController@unactive_brand');
Route::get('/active_brand/{brand_id}','BrandController@active_brand');
Route::get('/delete_brand/{brand_id}','BrandController@delete_brand');

//product route
Route::get('/add_product','ProductController@add_product');
Route::post('/save_product','ProductController@save_product');
Route::get('/all_product','ProductController@all_product');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/delete_product/{product_id}','ProductController@delete_product');
Route::get('/edit_product/{product_id}','ProductController@edit_product');

//slider

Route::get('/add_slider','SliderController@add_slider');
Route::post('/save_slider','SliderController@save_slider');
Route::get('/all_slider','SliderController@all_slider');
Route::get('/unactice_slider/{slider_id}','SliderController@unactice_slider');
Route::get('/actice_slider/{slider_id}','SliderController@actice_slider');
Route::get('/delete_slider/{slider_id}','SliderController@delete_slider');


Route::get('/product_by_cat/{cat_id}','HomeController@product_by_cat');
Route::get('/product_by_brand/{brand_id}','HomeController@product_by_brand');
Route::get('/product_details_by_id/{product_id}','HomeController@product_details_by_id');


Route::post('/add_cart','CartController@add_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete_cart_item_by_id/{rowId}','CartController@delete_cart_item_by_id');
Route::post('/update_cart','CartController@update_cart');

Route::get('/checklogin','CheckOutController@checklogin');
Route::post('/customar_signup','CheckOutController@customar_signup');
Route::get('/checkout','CheckOutController@checkout');
Route::post('/login','CheckOutController@login');
Route::post('/save_shiping_data','CheckOutController@save_shiping_data');
Route::get('/logout','CheckOutController@logout');
Route::get('/payment','CheckOutController@payment');
Route::post('/order_place','CheckOutController@order_place');

