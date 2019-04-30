<?php
use Modules\ProjectModule\Entities\Project_Category;
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
	Route::group(['prefix'=>'admin-panel' , 'middleware'=>'auth:admin'] , function() {

	    Route::resource('project','ProjectController');
	    Route::resource('project_categories','CategoryController');
	    Route::get('project-categories',function(){
	    	$projects=Project_Category::all();
	    	return view('projectmodule::categories.index',compact('projects'));
	    });
		// Route::get('project/ajax','ProjectController@dataTales');

	});
});
