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

Route::get('/', 'MainController@index')->name('main');
Route::get('/job/create/', 'JobController@create')->name('job.create');
Route::post('/job/', 'JobController@store')->name('job.store');
Route::get('/job/{id}/', 'JobController@show')->name('job.show');
Route::get('/job/{id}/apply/', 'JobController@apply')->name('job.apply');
Route::post('/job/{id}/apply/', 'JobController@storeApply')->name('job.storeApply');
Route::delete('/job/{id}/', 'JobController@destroy')->name('job.destroy');
Route::get('/admin/login/', 'AdminController@login')->name('admin.login');
Route::post('/admin/login/', 'AdminController@postLogin')->name('admin.postLogin');
Route::get('/admin/logout/', 'AdminController@logout')->name('admin.logout');
Route::get('/admin/', 'AdminController@index')->name('admin');
Route::get('/{mdl}/', 'SimpleRestController@index')->name('simple');
Route::get('/{mdl}/create/', 'SimpleRestController@create')->name('simple.create');
Route::post('/{mdl}/', 'SimpleRestController@store')->name('simple.store');
Route::delete('/{mdl}/{id}/', 'SimpleRestController@destroy')->name('simple.destroy');
