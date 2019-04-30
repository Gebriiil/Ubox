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

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localize' ] // Route translate middleware
],
function() {
	Route::prefix('admin-panel')->group(function() {

	    Route::resource('blog','BlogModuleController');
	    Route::get('blog/ajax','BlogModuleController@datatables');
		// Route::get('project/ajax','ProjectController@dataTales');

	});
});