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

Route::get('/', 'IndexController@index');
Route::get('article', 'ArticleController@index');
Route::get('a/{i}', 'ArticleController@detail');
Route::any('admin/login', 'Admin\AdminController@login');
Route::any('code', 'Admin\AdminController@code');

Route::group(['middleware'=>'admin.login', 'namespace'=>'Admin', 'prefix'=>'admin'], function(){
	Route::get('index', 'AdminController@index');
	Route::get('info', 'AdminController@info');


	Route::resource('admin/article', 'ArticleController@index');
});
