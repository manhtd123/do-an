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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::get('/', function () {
    	return view('admin.auth.login');
	});
    Route::get('/home', 'HomeController@index')->name('admin.home');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register')->name('admin.register');
    Route::resource('user', 'User\UserController', ['except' => 'show']);
    Route::resource('department', 'User\DepartmentController', ['except' => 'show', 'destroy']);
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController', ['except' => 'show', 'destroy']);
    Route::delete('image/{id}', 'ProductController@deleteImage')->name('admin.image');
    Route::resource('customer', 'CustomerController', ['except' => 'show']);
    Route::resource('producer', 'ProducerController', ['except' => 'show']);
    Route::resource('supplierGroup', 'SupplierGroupController', ['except' => 'show', 'create', 'destroy']);
    Route::post('group', 'ProducerController@createGroup')->name('groupncc');
    Route::resource('table', 'TableController');
    Route::resource('tableGroup', 'TableGroupController', ['except' => 'show', 'create', 'destroy']);
    Route::resource('dealProduct', 'DealProductController', ['except' => 'edit', 'update', 'destroy']);
    Route::post('getProduct', 'DealProductController@getProduct')->name('getProduct');
    Route::resource('billTable', 'BillTableController', ['except' => 'store', 'create', 'destroy', 'edit', 'update']);
    Route::get('sell', 'ReportController@sell')->name('admin.sell');
    Route::post('getSell', 'ReportController@getSell')->name('getSell');
    Route::get('getSellByMonth', 'ReportController@getSellByMonth')->name('getSellByMonth');
    Route::get('products', 'ReportController@product')->name('admin.products');
    Route::post('getProducts', 'ReportController@getProduct')->name('getProducts');
    Route::get('getProductByMonth', 'ReportController@getProductByMonth')->name('getProductByMonth');
    Route::get('customers', 'ReportController@customer')->name('admin.customers');
    Route::get('getCustomers', 'ReportController@getCustomers')->name('getCustomers');
    Route::post('getCustomersByMonth', 'ReportController@getCustomersByMonth')->name('getCustomersByMonth');
    Route::get('producers', 'ReportController@producer')->name('admin.producers');
    Route::get('getProducers', 'ReportController@getProducers')->name('getProducers');
    Route::post('getProducersByMonth', 'ReportController@getProducersByMonth')->name('getProducersByMonth');
    Route::get('employee', 'ReportController@employee')->name('admin.employee');
    Route::get('getEmployees', 'ReportController@getEmployees')->name('getEmployees');
    Route::post('getEmployeesByMonth', 'ReportController@getEmployeesByMonth')->name('getEmployeesByMonth');
    Route::post('homeProducts', 'HomeController@product')->name('home.product');
    Route::get('homeProductsByMonth', 'HomeController@getProductByMonth')->name('home.getProductByMonth');
    Route::get('revenueByDay', 'HomeController@revenueByDay')->name('home.revenueByDay');
});

Route::group(['prefix' => 'receptionist', 'namespace' => 'User\receptionist', 'middleware' => 'receptionist'], function () {
    Route::resource('booking', 'BookingController', ['except' => 'destroy', 'show']);
});

Route::group(['prefix' => 'cashier', 'namespace' => 'User\cashier', 'middleware' => 'cashier'], function () {
    Route::resource('menu', 'MenuController', ['except' => 'edit', 'update', 'destroy', 'create']);
    Route::post('getBooking', 'MenuController@getBooking')->name('getBooking');
    Route::post('getTable', 'MenuController@getTable')->name('getTable');
    Route::post('getMenu', 'MenuController@getMenu')->name('getMenu');
    Route::post('getDetailBill', 'MenuController@getDetailBill')->name('getDetailBill');
    Route::get('table', 'TableController@index')->name('cashier.table');
    Route::post('cashier-table', 'TableController@getTable')->name('cashier.getTable');
    Route::post('cashier-payment', 'MenuController@updatePayment')->name('cashier.payment');
    Route::get('menu-page', 'MenuController@homePage')->name('cashier.menuPage');
    Route::get('table-page', 'TableController@homePage')->name('cashier.tablePage');
});

Route::group(['prefix' => 'chief', 'namespace' => 'User\chief', 'middleware' => 'chief'], function () {
    Route::get('index', 'ChiefController@index')->name('chief.index');
    Route::post('postQuantity', 'ChiefController@postQuantity')->name('chief.postQuantity');
});
