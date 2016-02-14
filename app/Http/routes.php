<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 *  Middlware route level
 *  Route::get('about',['middleware' => 'auth', 'uses' => 'PagesController@about']);
 */

/**
 *  Middlware route level //function
 *  Route::get('about',['middleware' => 'auth',function () {
 *  	return 'this is a test';
 *  }]);
 */


Route::get('about','PagesController@about');
Route::get('contact','PagesController@contact');
Route::get('dashboard','DashboardController@index');
/*Route::get('admin/rates','AdministratorController@rates');*/
/*Route::get('admin/rates','AdministratorController@rates');
Route::get('admin/rates/edit/{id}','AdministratorController@editRates');
Route::get('admin/rate/update','AdministratorController@updateRates');*/
/*
Route::get('articles','ArticlesController@index');
Route::get('articles/create','ArticlesController@create');
Route::get('articles/{id}','ArticlesController@show');
Route::post('articles','ArticlesController@store');
Route::get('articles/{id}/edit','ArticlesController@edit');
*/

Route::resource('articles','ArticlesController');
Route::get('customers/listing','CustomersController@listing');
Route::get('customers/membership_listing','CustomersController@membership_listing');
Route::get('customers/gymaccess_listing','CustomersController@gymaccess_listing');
Route::get('customers/{id}/membership','CustomersController@membership');
Route::patch('customers/{id}/membership_update','CustomersController@membership_update');
Route::get('customers/{id}/gymaccess','CustomersController@gymaccess');
Route::patch('customers/{id}/gymaccess_update','CustomersController@gymaccess_update');
Route::resource('customers','CustomersController');


Route::get('/ajax-rateInfo','RatesController@ajaxRateInfo');
/*Route::get('/ajax-rateInfo',function(){
	$rate_id = Input::get('rate_id');
	$rate = 

});*/

Route::resource('rates','RatesController');

Route::resource('motherboards','MotherboardsController');

Route::get('tags/{tags}', 'TagsController@show');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

Route::get('foo',['middleware' => 'manager', function(){
	return 'this page may only be view my managers';
}]);