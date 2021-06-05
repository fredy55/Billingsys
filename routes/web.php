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


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
