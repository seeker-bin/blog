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

Route::any('login', 'Admin\AdminController@login');
Route::any('code', 'Admin\AdminController@code');
Route::any('upload', 'Admin\UploadController@doUpload');

Route::group(['namespace'=>'Home'], function(){
	Route::get('/', 'IndexController@index');
	Route::get('article', 'ArticleController@index');
	Route::get('a/{i}', 'ArticleController@detail');
	Route::post('comment', 'ArticleController@addComment');
});

Route::group(['middleware'=>'admin.login', 'namespace'=>'Admin', 'prefix'=>'admin'], function(){
	Route::get('index', 'AdminController@index');
	Route::get('info', 'AdminController@info');
	
	Route::resource('category', 'CategoryController');
	Route::post('cate/changeOrder', 'CategoryController@changeOrder');

	Route::resource('article', 'ArticleController');

	Route::resource('config', 'ConfigController');
	Route::get('config/putfile', 'ConfigController@putFile');
    Route::post('config/changeOrder', 'ConfigController@changeOrder');
    Route::post('config/changeContent', 'ConfigController@changeContent');

    Route::resource('links', 'LinksController');

    Route::resource('navs', 'NavsController');
});
