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

Route::prefix('admin-panel')->group(function () {

	Route::get('/jobs/index', 'JobModuleController@index')->name('jobs_index');
	Route::resource('/jobs', 'JobModuleController')->except('index');
	
});
