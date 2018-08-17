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

Route::group(['prefix' => 'login', 'middleware'=>'CheckLogout'], function(){
	Route::get('/', 'Admin\LoginController@getLogin');
	Route::post('/', 'Admin\LoginController@postLogin');
});
Route::get('logout', 'Admin\LoginController@logout');
	





Route::group(['namespace' => 'Admin'], function (){
	Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function (){
		Route::get('/', 'HomeController@getHome');

		Route::group(['prefix' => 'account'], function(){
		
	        Route::get('/', 'AccountController@getList');

	        Route::get('add','AccountController@getAdd');
	        Route::post('add','AccountController@postAdd');

	        Route::get('edit/{id}','AccountController@getEdit');
	        Route::post('edit/{id}','AccountController@postEdit');

	        Route::get('delete/{id}','AccountController@getDelete');

	    });
	    Route::group(['prefix' => 'profile'], function(){

            Route::get('/', 'ProfileController@getDetail');
            Route::post('/', 'ProfileController@postDetail');

            Route::get('change_pass', 'ProfileController@getChangePass');
            Route::post('change_pass', 'ProfileController@postChangePass');

        });
	});

	
});
Route::group(['namespace' => 'Client', 'middleware' => 'CheckClient'], function(){
	Route::get('/', 'HomeController@getHome');
	Route::get('deposit', 'TransactionController@getDeposit');
	Route::post('deposit', 'TransactionController@postDeposit');

	Route::get('deposit', 'TransactionController@getDeposit');
	Route::get('deposit', 'TransactionController@getDeposit');
});