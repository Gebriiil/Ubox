<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ] // Route translate middleware
    ],
    function() {


    Route::get('/projectonly','FrontModuleController@projects_only');
    
	Route::get('/news/{id}', 'FrontModuleController@new')->name('only_new');
    Route::post('/news/{id}/add-comment', 'FrontModuleController@comment')->name('comment');

	Route::get('/', 'FrontModuleController@index')->name('home');

    Route::get('/', 'FrontModuleController@index')->name('home');
    Route::get('/contact_us', 'FrontModuleController@contact_us')->name('contact_us');
    Route::get('/about_us', 'FrontModuleController@about_us')->name('about_us');
    Route::get('/blog', 'FrontModuleController@blog')->name('blog');
    Route::get('/videos', 'FrontModuleController@videos')->name('videos');
    Route::get('/services', 'FrontModuleController@services')->name('services');
    Route::get('/projects', 'FrontModuleController@projects')->name('projects');
    Route::post('/add-newsletters', 'FrontModuleController@add_to_newsletters')->name('newsletters');


	Route::get('/language/{lang}', 'FrontModuleController@language')->name('lang');

});
