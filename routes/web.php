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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\AdminController@index');
Route::post('/admin/checkLogin', 'Admin\AdminController@checkLogin')->name('admin.checkLogin');

Route::group([ 'middleware' => 'auth:admin'], function () {
Route::get('/admin/users', 'Admin\AdminController@users')->name('admin.users');
Route::post('/admin/updateUserStatus/{id}', 'Admin\AdminController@updateUserStatus')->name('admin.updateUserStatus');
Route::post('/admin/updateActivity/{id}', 'Admin\AdminController@updateActivity')->name('admin.updateActivity');
Route::get('/admin/profile', 'Admin\AdminController@profile')->name('admin.profile');
Route::get('/admin/updateProfile', 'Admin\AdminController@updateProfile')->name('admin.updateProfile');






});




