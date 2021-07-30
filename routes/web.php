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
Route::get('/', function () {
    return view('welcome');
});
*/

//============================= FRONT PAGES =============================//
Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('home');
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('home.login');
Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


//============================= DASHBOARD PAGES =============================//
Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');


//============================= SERVICES PAGES =============================//
Route::group(['prefix' => 'services'], function () {
    Route::get('/', 'Admin\ServicesController@index')->name('service.list');
    Route::get('/view/{id}', 'Admin\ServicesController@show')->name('service.details');
    Route::get('/add', 'Admin\ServicesController@create')->name('service.add');
    Route::post('/save', 'Admin\ServicesController@store')->name('service.save');
    Route::get('/edit/{id}', 'Admin\ServicesController@edit')->name('service.edit');
    Route::post('/update', 'Admin\ServicesController@update')->name('service.update');
    Route::get('/delete/{id}', 'Admin\ServicesController@destroy')->name('service.delete');
});

//============================= SERVICE CATEGORY PAGES =============================//
Route::group(['prefix' => 'services/category'], function () {
    Route::get('/', 'Admin\ServcatController@index')->name('service.category.list');
    Route::get('/view/{id}', 'Admin\ServcatController@show')->name('service.category.details');
    Route::get('/add', 'Admin\ServcatController@create')->name('service.category.add');
    Route::post('/save', 'Admin\ServcatController@store')->name('service.category.save');
    Route::get('/edit/{id}', 'Admin\ServcatController@edit')->name('service.category.edit');
    Route::post('/update', 'Admin\ServcatController@update')->name('service.category.update');
    Route::get('/delete/{id}', 'Admin\ServcatController@destroy')->name('service.category.delete');
}); 

//============================= COMPANY PAGES =============================//
Route::group(['prefix' => 'company'], function () {
    Route::get('/', 'Admin\CompinfoController@index')->name('company.list');
    Route::get('/view/{id}', 'Admin\CompinfoController@show')->name('company.details');
    Route::get('/add', 'Admin\CompinfoController@create')->name('company.add');
    Route::post('/save', 'Admin\CompinfoController@store')->name('company.save');
    Route::get('/edit/{id}', 'Admin\CompinfoController@edit')->name('company.edit');
    Route::post('/update', 'Admin\CompinfoController@update')->name('company.update');
    Route::get('/delete/{id}', 'Admin\CompinfoController@destroy')->name('company.delete');
}); 


//============================= CLIENTS PAGES =============================//
Route::group(['prefix' => 'clients'], function () {
    Route::get('/', 'Admin\ClientsController@index')->name('clients.list');
    Route::get('/view/{id}', 'Admin\ClientsController@show')->name('clients.details');
    Route::get('/add', 'Admin\ClientsController@create')->name('clients.add');
    Route::post('/save', 'Admin\ClientsController@store')->name('clients.save');
    Route::get('/edit/{id}', 'Admin\ClientsController@edit')->name('clients.edit');
    Route::post('/update', 'Admin\ClientsController@update')->name('clients.update');
    Route::get('/delete/{id}', 'Admin\ClientsController@destroy')->name('clients.delete');
}); 

//============================= BILLINGS PAGES =============================//
Route::group(['prefix' => 'billings'], function () {
    Route::get('/', 'Admin\BillingController@index')->name('bills.list');
    Route::get('/view/{id}', 'Admin\BillingController@show')->name('bills.details');
    Route::get('/{id}/add', 'Admin\BillingController@addBill')->name('bills.add');
    Route::post('/billInfo', 'Admin\BillingController@getBillInfo')->name('bills.add.info');
    Route::post('/getBillOption', 'Admin\BillingController@getBillOptions')->name('bills.add.options');
    Route::post('/saveBill', 'Admin\BillingController@saveBill')->name('bills.add.save');

    Route::get('/{id}/invoice', 'Admin\BillingController@generateRecpt')->name('bills.invoice.create');
}); 


//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
