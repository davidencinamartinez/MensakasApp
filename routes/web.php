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

// CONSUMER APP

	Route::get('/', 'ConsumerApp\IndexController@getLocations')->name('index');

	Route::get('locations/{id}', 'ConsumerApp\IndexController@getBusinesses');

	Route::get('business/{id}', 'ConsumerApp\IndexController@getBusinessDetails');

	// SHOPPING CART

		Route::post('checkout', 'ConsumerApp\IndexController@postOrder');

// AUTHENTICATION ROUTES

	Route::get('/login', function () {
		return view('login');
	});

	Route::post('/login', 'LoginController@loginUser');

	Route::post('/logout', 'LoginController@logoutUser');

// ADMIN PANEL

	// USERS ROUTES

		// USERS LIST

			Route::get('admin/users', 'AdminPanel\UsersController@getAllUsers')->name('users');

		// USER DETAILS

			Route::get('admin/users/{id}', 'AdminPanel\UsersController@getUser');

		// USER DATA UPDATE

			Route::post('admin/users/update/{id}', 'AdminPanel\UsersController@updateUser');

		// USER DELETE

			Route::post('admin/users/delete/{id}', 'AdminPanel\UsersController@deleteUser');

		// USER CREATION

			// USER CREATION VIEW

				Route::get('admin/new/user', function () {
					return view('adminPanel.users.user_create');
				});

			// USER CREATION DB

				Route::post('admin/new/user', 'AdminPanel\UsersController@createUser');

	// BUSINESSES ROUTES

		// BUSINESSES LIST

			Route::get('admin/businesses', 'AdminPanel\BusinessController@getAllBusinesses')->name('businesses');

		// BUSINESS DETAILS

			Route::get('admin/businesses/{id}', 'AdminPanel\BusinessController@getBusiness');

		// BUSINESS UPDATE 

			Route::post('admin/businesses/update/{id}', 'AdminPanel\BusinessController@updateBusiness');

		// BUSINESS DELETE

			Route::post('admin/businesses/delete/{id}', 'AdminPanel\BusinessController@deleteBusiness');

		// BUSINESS CREATION

			// BUSINESS CREATION VIEW

				Route::get('admin/new/business', function () {
					$cat = DB::table('categories')->get();
					$locations = DB::table('locations')->get();
					return view('adminPanel.business.business_create', [	'categories' => $cat,
																'locations' => $locations
					]);
				});

			// BUSINESS CREATION DB

				Route::post('admin/new/business', 'AdminPanel\BusinessController@createBusiness');

	// ORDERS ROUTES

		// ORDERS LIST

			Route::get('admin/orders', 'AdminPanel\OrdersController@getAllOrders')->name('orders');

		// ORDER DETAILS

			Route::get('admin/orders/{id}', 'AdminPanel\OrdersController@getOrder');

	// ITEMS ROUTES

		// ITEMS LIST

			Route::get('admin/items', 'AdminPanel\ItemsController@getAllItems');