<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\ServcatController;
use App\Http\Controllers\Admin\CompinfoController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\ClientsController;


//============================= FRONT PAGES =============================//
//Non-Authenticated Administrators
Route::middleware('guest:admin')->group(function(){
    Route::controller(LoginController::class)
    ->group(function(){
        Route::get('/', 'showLoginForm')->name('home');
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'validateLogin')->name('home.login');
    });

});


//Authenticated Administrators
Route::middleware('auth:admin')->group(function(){
    
    Route::controller(LoginController::class)
    ->group(function(){
        Route::post('/logout', 'logout')->name('admin.logout');
    });

    //============================= DASHBOARD PAGES =============================//
    Route::controller(AdminController::class)
    ->group(function(){
        Route::get('/home', 'index')->name('admin.dashboard');
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });

    //============================= SERVICES PAGES =============================//
    Route::controller(ServicesController::class)
    ->name('service.')
    ->prefix('service')
    ->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/view/{id}', 'show')->name('details');
        Route::get('/add', 'create')->name('add');
        Route::post('/save', 'store')->name('save');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
    });

    //============================= SERVICE CATEGORY PAGES =============================//
    Route::controller(ServcatController::class)
    ->name('service.category.')
    ->prefix('services/category')
    ->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/view/{id}', 'show')->name('details');
        Route::get('/add', 'create')->name('add');
        Route::post('/save', 'store')->name('save');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
    });

    //============================= COMPANY PAGES =============================//
    Route::controller(CompinfoController::class)
    ->name('company.')
    ->prefix('company')
    ->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/view/{id}', 'show')->name('details');
        Route::get('/add', 'create')->name('add');
        Route::post('/save', 'store')->name('save');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::post('/{id}/updateimg', 'updateImg')->name('profile.update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
    });

    //============================= CLIENTS PAGES =============================//
    Route::controller(ClientsController::class)
    ->name('clients.')
    ->prefix('clients')
    ->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/view/{id}', 'show')->name('details');
        Route::get('/add', 'create')->name('add');
        Route::post('/save', 'store')->name('save');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('delete');
    });

    //============================= BILLINGS PAGES =============================//
    Route::controller(BillingController::class)
    ->name('bills.')
    ->prefix('billings')
    ->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/view/{id}', 'show')->name('details');
        Route::get('/{id}/add', 'addBill')->name('add');
        Route::post('/billInfo', 'getBillInfo')->name('add.info');
        Route::post('/getBillOption', 'getBillOptions')->name('add.options');
        Route::post('/saveBill', 'saveBill')->name('add.save');

        Route::get('/{id}/invoice', 'generateInvc')->name('invoice.create');
        Route::get('/{id}/receipt', 'generateRecpt')->name('receipt.create');
        Route::get('/{id}/delete', 'destroy')->name('invoice.delete');
        Route::post('/pay/update', 'payUpdate')->name('pay.update');
    });
});

