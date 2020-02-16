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

// AUTHENTICATION ROUTES

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

// USERS ROUTES

	// USERS LIST

		Route::get('admin/users', 'UsersController@getAllUsers')->name('users');

	// USER DETAILS

		Route::get('admin/users/{id}', 'UsersController@getUser');

	// USER DATA UPDATE

		Route::post('admin/users/update/{id}', 'UsersController@updateUser');

	// USER DELETE

		Route::post('admin/users/delete/{id}', 'UsersController@deleteUser');

	// USER CREATION

		// USER CREATION VIEW

			Route::get('admin/new/user', function () {
				return view('users.user_create');
			});

		// USER CREATION DB

			Route::post('admin/new/user', 'UsersController@createUser');

// BUSINESSES ROUTES

	// BUSINESSES LIST

		Route::get('admin/businesses', 'BusinessController@getAllBusinesses')->name('businesses');

	// BUSINESS DETAILS

		Route::get('admin/businesses/{id}', 'BusinessController@getBusiness');

	// BUSINESS UPDATE 

		Route::post('admin/businesses/update/{id}', 'BusinessController@updateBusiness');

	// BUSINESS DELETE

		Route::post('admin/businesses/delete/{id}', 'BusinessController@deleteBusiness');

	// BUSINESS CREATION

		// BUSINESS CREATION VIEW

			Route::get('admin/new/business', function () {
				$cat = DB::table('categories')->get();
				$locations = DB::table('locations')->get();
				return view('business.business_create', [	'categories' => $cat,
															'locations' => $locations
				]);
			});

		// BUSINESS CREATION DB

			Route::post('admin/new/business', 'BusinessController@createBusiness');

// ORDERS ROUTES

	// ORDERS LIST

		Route::get('admin/orders', 'OrdersController@getAllOrders')->name('orders');

	// ORDER DETAILS

		Route::get('admin/orders/{id}', 'OrdersController@getOrder');