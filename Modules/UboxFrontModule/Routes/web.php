<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ] // Route translate middleware
    ],
    function() {

	Route::get('/', 'FrontModuleController@index')->name('front_index');
    Route::get('/projectonly','FrontModuleController@projects_only');
	Route::get('/category/{id}', 'ProductsFrontController@category')->name('only_category');
	Route::get('/product/{id}', 'ProductsFrontController@product')->name('only_product');
	Route::get('/search', 'ProductsFrontController@product_search')->name('product_search');

    Route::post('/rate', 'ProductsFrontController@insert_review')->name('setrate');

	Route::get('/', 'FrontModuleController@index')->name('home');

    Route::get('/', 'FrontModuleController@index')->name('home');
    Route::get('/contact_us', 'FrontModuleController@contact_us')->name('contact_us');
    Route::get('/about_us', 'FrontModuleController@about_us')->name('about_us');
    Route::get('/blog', 'FrontModuleController@blog')->name('blog');
    Route::get('/videos', 'FrontModuleController@videos')->name('videos');
    Route::get('/services', 'FrontModuleController@services')->name('services');

	Route::middleware('user')->group(function () {



		Route::get('/wishlist', 'FrontModuleController@wishlist')->name('wishlist');
		Route::get('/myaccount', 'FrontModuleController@myaccount')->name('myaccount');

	});

	Route::get('/language/{lang}', 'FrontModuleController@language')->name('lang');

});
