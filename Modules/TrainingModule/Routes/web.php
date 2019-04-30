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

        Route::get('training/index' , 'TrainingController@taining_index')->name('training_index');
	    Route::resource('training','TrainingController')->except('index');

        Route::get('training-category/index' , 'CategoryController@taining_category_index')->name('training_category_index');
	    Route::resource('training-category','CategoryController')->except('index');
		// Route::get('project/ajax','ProjectController@dataTales');


	});
});
