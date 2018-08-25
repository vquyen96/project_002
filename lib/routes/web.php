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
	
Route::group(['prefix' => 'register', 'middleware'=>'CheckLogout'], function(){
	Route::get('/', 'Admin\LoginController@getRegister');
	Route::post('/', 'Admin\LoginController@postRegister');
});




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
Route::group(['namespace' => 'Client'], function(){
	Route::get('/', 'HomeController@getHome');

	Route::get('deposit', 'TransactionController@getDeposit');
	Route::post('deposit', 'TransactionController@postDeposit');

	Route::get('deposit', 'TransactionController@getDeposit');
	Route::get('deposit', 'TransactionController@getDeposit');


	Route::get('test', 'HomeController@getTest');


	Route::group(['prefix' =>'quick'], function(){
		Route::post('deposit', 'QuickController@postDeposit');
		Route::post('withdraw', 'QuickController@postWithdraw');
		Route::post('tranfer', 'QuickController@postTranfer');

	});
	Route::group(['prefix'=>'user'], function(){
		Route::get('/', 'UserController@getHome');
		Route::post('change', 'UserController@postChange');
		Route::get('check', 'UserController@getCheck');
		Route::post('check', 'UserController@getCheck');

		Route::get('history', 'UserController@getHistory');
		// Route::get('deposit', 'UserController@getDeposit');
		Route::post('deposit', 'UserController@postDeposit');
		Route::post('get_deposit', 'UserController@getDeposit');
		Route::post('get_withdraw', 'UserController@getWithdraw');
		Route::post('get_transfer', 'UserController@getTransfer');
		// Route::get('withdraw', 'UserController@getWithdraw');
		Route::post('withdraw', 'UserController@postWithDraw');

		Route::get('transfer', 'UserController@getTransfer');
		Route::post('transfer', 'UserController@postTransfer');

		Route::post('detail', 'UserController@postDetail');


	});
});