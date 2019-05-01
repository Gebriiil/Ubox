<?php



Route::post('user/register','UserAuthController@register');
Route::post('user/login','UserAuthController@login');
Route::post('user/send-sms','UserAuthController@sendSMS');
Route::post('user/verify-sms','UserAuthController@verifySMS');


Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('user/show','Api\UserApiController@getUser');
    Route::put('user/update-profile','Api\UserApiController@updateProfile');
    Route::resource('user/address','Api\AddressApiController');

    Route::post('user/withdraw','Api\WalletTransactionApiController@withdraw');
    Route::post('user/deposit','Api\WalletTransactionApiController@deposit');

    Route::get('user/transaction-history','Api\WalletTransactionApiController@history');
    Route::get('user/wallet','Api\WalletTransactionApiController@getWallet');

});