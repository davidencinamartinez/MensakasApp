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

// HOME ROUTE

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('auth.login');
});

// USERS ROUTES

	// USERS LIST

		Route::get('users', 'UsersController@getAllUsers')->name('users');

	// USER DETAILS

		Route::get('users/{id}', 'UsersController@getUser');

	// USER DATA UPDATE

		Route::post('users/update/{id}', 'UsersController@updateUser');

	// USER DELETE

		Route::post('users/delete/{id}', 'UsersController@deleteUser');

	// USER CREATION

		// USER CREATION VIEW

			Route::get('new/user', function () {
				return view('users.user_create');
			});

		// USER CREATION DB

			Route::post('new/user', 'UsersController@createUser');

// BUSINESSES ROUTES

	// BUSINESSES LIST

		Route::get('businesses', 'BusinessController@getAllBusinesses')->name('businesses');

	// BUSINESS DETAILS

		Route::get('businesses/{id}', 'BusinessController@getBusiness');

	// BUSINESS UPDATE 

		Route::post('businesses/update/{id}', 'BusinessController@updateBusiness');

	// BUSINESS DELETE

		Route::post('businesses/delete/{id}', 'BusinessController@deleteBusiness');

	// BUSINESS CREATION

		// BUSINESS CREATION VIEW

			Route::get('new/business', function () {
				$cat = DB::table('categories')->get();
				return view('business.business_create', [	'categories' => $cat
				]);
			});

		// BUSINESS CREATION DB

			Route::post('new/business', 'BusinessController@createBusiness');

// ORDERS ROUTES

	// ORDERS LIST

		Route::get('orders', 'OrdersController@getAllOrders')->name('orders');

	// ORDER DETAILS

		Route::get('orders/{id}', 'OrdersController@getOrder');