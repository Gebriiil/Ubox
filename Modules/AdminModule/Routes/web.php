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

Route::prefix('admin-panel')->group(function() {
    Route::get('/', 'AdminModuleController@index');
    Route::get('/login-page','AdminLoginController@login_page');
    Route::post('/login','AdminLoginController@dologin');
    Route::resource('/admins','AdminModuleController');
});
