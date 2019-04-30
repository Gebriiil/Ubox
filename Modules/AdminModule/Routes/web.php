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
	    Route::get('/login-page','AdminLoginController@login_page')->name('login');
	    Route::post('/login','AdminLoginController@dologin');
	    
	    Route::group(['middleware'=>'auth:admin'] , function(){
	    	Route::resource('/admins','AdminModuleController');
	    	Route::get('/', 'AdminModuleController@index');

	    });

	});
});
