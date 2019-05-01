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

// Route::prefix('usermodule')->group(function() {
//     Route::get('/login', 'UserModuleController@index')->name('login');
// });

/*
Route::group(['middleware' => 'lang'] , function (){


    Route::get('/login', 'UserController@getLogin')->name('login');
    Route::post('/login', 'UserController@login')->name('login');
    Route::get('/register', 'UserController@getRegister')->name('register');
    Route::post('/register', 'UserController@register')->name('register');


});

Route::get('/user-check-email',  'UserController@checkEmail' );
Route::get('/user-check-email-not-exist' , 'UserController@checkEmailNotExist' );


Route::group(['middleware' => 'user'] , function (){

    Route::get('/logout', 'UserController@logout')->name('logout');

    Route::PUT('/update-profile', 'UserController@updateProfile')->name('update-profile');

});
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ] // Route translate middleware
    ],
function() {
        Route::prefix('admin-panel')->group(function() {
            Route::get('user/index' , 'UserController@user_index')->name('user_index');
            Route::resource('user', 'UserController');
            Route::post('user-transaction/deposit/{id}','UserController@deposit');

    });
});
