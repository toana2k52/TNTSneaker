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
Route::get('/','HomeController@index')->name('home');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'],function(){
	Route::get('/','AdminController@index')->name('admin');

	// register
	Route::get('register_admin','AdminController@register_admin')->name('register_admin');
	Route::post('register_admin','AdminController@post_register_admin')->name('register_admin');
	//reset_password
	Route::get('reset_password','AdminController@reset_password')->name('reset_password');
	Route::post('reset_password','AdminController@post_reset_password')->name('reset_password');
	
	//category
	Route::get('category','CategoryController@index')->name('admin.category');
	Route::get('category-del/{id}','CategoryController@del')->name('admin.category-del');
	Route::get('category-add','CategoryController@add')->name('admin.category-add');
	Route::post('category-add','CategoryController@post_add')->name('admin.category-add');
	Route::get('category-edit/{id}','CategoryController@edit')->name('admin.category-edit');
	Route::post('category-edit/{id}','CategoryController@post_edit')->name('admin.category-edit');
	
	//product
	Route::get('product','ProductController@index')->name('admin.product');
	Route::get('product/{id}','ProductController@index_dt')->name('admin.product-dt');
		//add
	Route::get('product-add','ProductController@add')->name('admin.product-add');
	Route::post('product-add','ProductController@post_add')->name('admin.product-add');

	Route::get('product-add-detail/{id}','ProductController@add_detail')->name('admin.product-detail-add');
	Route::post('product-add-detail/{id}','ProductController@post_add_detail')->name('admin.product-detail-add');

	Route::get('product-add-image/{id}','ProductController@add_image')->name('admin.product-image-add');
	Route::post('product-add-image/{id}','ProductController@post_add_image')->name('admin.product-image-add');
		//edit
	Route::get('product-edit/{id}','ProductController@edit')->name('admin.product-edit');
	Route::post('product-edit/{id}','ProductController@edit')->name('admin.product-edit');

	Route::get('product-edit-detail/{id}/{id_detail}','ProductController@edit_detail')->name('admin.product-edit-detail');
	Route::post('product-edit-detail/{id}/{id_detail}','ProductController@post_edit_detail')->name('admin.product-edit-detail');
	Route::get('product-delete-image/{id}','ProductController@delete_image')->name('admin.product-delete-image');
		//delete
	Route::get('product-delete/{id}','ProductController@delete')->name('admin.product-delete');

	Route::get('product-delete-detail/{id}','ProductController@delete_detail')->name('admin.product-delete-detail');

	//brands
	Route::get('brands','BrandsController@index')->name('admin.brands');
		//add
	Route::get('brands-add','BrandsController@add')->name('admin.brands-add');
	Route::post('brands-add','BrandsController@post_add')->name('admin.brands-add');
		//edit
	Route::get('brands-edit/{id}','BrandsController@edit')->name('admin.brands-edit');
	Route::post('brands-edit/{id}','BrandsController@post_edit')->name('admin.brands-edit');
		//delete
	Route::get('brands-delete/{id}','BrandsController@delete')->name('admin.brands-delete');

	//member
	Route::get('member','AdminController@index_member')->name('admin.member');
		//edit
	Route::get('member-edit/{id}','AdminController@edit')->name('admin.member-edit');
	Route::post('member-edit/{id}','AdminController@edit')->name('admin.member-edit');
		//delete
	Route::get('member-delete/{id}','AdminController@delete')->name('admin.member-delete');

	//info
	Route::get('info','AdminController@index_info')->name('admin.info');

	//order
	Route::get('order','OrderController@index')->name('admin.order');
	Route::get('order-detail/{order_id}','OrderController@index_order_detail')->name('admin.order_detail');
	Route::post('order-edit/{id}','OrderController@post_edit')->name('admin.order_edit');

	//customer
	Route::get('customer','CustomerController@index')->name('admin.customer');
		//add
	Route::get('customer-add','CustomerController@add')->name('admin.customer-add');
	Route::post('customer-add','CustomerController@post_add')->name('admin.customer-add');
		//edit
	Route::get('customer-edit/{id}','CustomerController@edit')->name('admin.customer-edit');
	Route::post('customer-edit/{id}','CustomerController@edit')->name('admin.customer-edit');
		//delete
	Route::get('customer-delete/{id}','CustomerController@delete')->name('admin.customer-delete');
		
		//customer_address
	Route::get('customer-customer_address/{id}','CustomerController@customer_address_index')->name('admin.customer-customer_address');
	Route::get('customer-customer_address-add/{id}','CustomerController@customer_address_add')->name('admin.customer-customer_address-add');
	
	Route::post('customer-customer_address-add/{id}','CustomerController@post_customer_address_add')->name('admin.customer-customer_address-add');
	
	Route::get('customer-customer_address-edit/{id}/{id_cuss}','CustomerController@customer_address_edit')->name('admin.customer-customer_address-edit');
	
	Route::post('customer-customer_address-edit/{id}/{id_cuss}','CustomerController@post_customer_address_edit')->name('admin.customer-customer_address-edit');
	
	Route::get('customer-customer_address-delete/{id}','CustomerController@customer_address_delete')->name('admin.customer-customer_address-delete');
});

	// login-logout
	Route::get('admin/login','Admin\AdminController@login')->name('login');
	Route::post('admin/login','Admin\AdminController@post_login')->name('login');
	Route::get('admin/logout','Admin\AdminController@logout')->name('logout');
	//endlogin-logout


//User
Route::group(['prefix'=>'user','namespace'=>'User'],function(){
	Route::get('/','UserController@index')->name('user');
	Route::get('/register','UserController@register')->name('user.register');
	Route::post('/register','UserController@post_register')->name('user.register');
	
	//product
	Route::get('product-all','ProductController@index')->name('user.product-all');
	Route::get('product-detail/{slug}/{id}','ProductController@product_detail')->name('user.product-detail');
	Route::get('product-new','ProductController@new')->name('user.product-new');
	Route::get('product-sale','ProductController@sale')->name('user.product-sale');
	Route::get('product-brand','ProductController@brand')->name('user.product-brands');
	Route::get('product-search','ProductController@search')->name('user.product-search');
	Route::post('product-search-price','ProductController@search_price')->name('user.product-search-price');

	Route::get('product-search_category/{slug}','ProductController@search_category')->name('user.product-search_category');
	Route::get('product-search_brand/{name}','ProductController@search_brand')->name('user.product-search_brand');

	Route::get('about','AboutController@index')->name('user.about');
	Route::get('feedback','FeedbackController@index')->name('user.feedback');
	//cart
	Route::get('cart','CartController@index')->name('user.cart');
	Route::get('cart/{customer_id}/{product_detail_id}/{quantity}','CartController@add')->name('user.cart_add');
	Route::post('cart/{customer_id}/{product_detail_id}/{quantity}/{product_id}','CartController@post_add')->name('user.cart_add_post');
	Route::post('cart/{id}','CartController@post_update_quantity')->name('user.cart_update_quantity');
	Route::get('cart/{id}','CartController@delete')->name('user.cart_delete');
	Route::get('cart_all/{customer_id}','CartController@delete_all')->name('user.cart_delete_all');
	//oder
	Route::get('order-list','OrderController@index_list')->name('user.order_list');
	Route::get('order-list-detail/{order_id}','OrderController@order_detail_list')->name('user.order_list_detail');
	Route::get('order-list-detail-edit/{order_id}','OrderController@order_detail_list_edit')->name('user.order_list_detail_edit');
	Route::get('order/{customer_add_id}','OrderController@index')->name('user.order');
	Route::get('order-detail/{customer_address_id}','OrderController@index_order_detail')->name('user.order_detail');

	Route::post('order-detail-user','OrderController@add_order_detail_user')->name('user.add_order_detail_user');


	//Customer
	Route::get('info','CustomerController_User@index')->name('user.customer_info');
	Route::get('info-add-customer-address','CustomerController_User@customer_address_add')->name('user.customer_add_address');
	Route::post('customer-add-address/{id}/{check}','CustomerController_User@post_customer_address_add')->name('user.customer_address_add');
	Route::get('user-customer_address-delete/{id}','CustomerController_User@customer_address_delete')->name('user.customer_address-delete');
	Route::get('customer-edit-address/{id}','CustomerController_User@customer_address_edit')->name('user.customer_address_edit');
	Route::post('customer-edit-address/{id}','CustomerController_User@post_customer_address_edit')->name('user.customer_address_edit');
	Route::get('customer-edit-info','CustomerController_User@customer_edit_info')->name('user.customer-edit-info');
	Route::post('customer-edit-info','CustomerController_User@post_customer_edit_info')->name('user.customer-edit-info');
	Route::get('user.customer-reset-password-info','CustomerController_User@reset_password_info')->name('user.customer-reset-password-info');
	Route::post('user.customer-reset-password-info','CustomerController_User@post_reset_password_info')->name('user.customer-reset-password-info');

	//cart_user
	Route::get('add-to-cart_user/{id}/{check}','UserController@add_cart_user')->name('user.add-to-cart_user');
	Route::post('add-to-cart_user/{id}','UserController@post_add_cart_user')->name('user.post-add-to-cart_user');
	Route::post('update-cart_user/{id}','UserController@update_cart_user')->name('user.update-cart_user');
	Route::get('delete-cart_user/{id}','UserController@delete_cart_user')->name('user.delete-cart_user');
	Route::get('clear-cart_user','UserController@clear_cart_user')->name('user.clear-cart_user');
});

	// User-login-logout
	Route::get('user/login','User\UserController@login')->name('user.login');
	Route::post('user/login','User\UserController@post_login')->name('user.login');
	Route::get('user/logout','User\UserController@logout')->name('user.logout');
	//end-User-login-logout

	