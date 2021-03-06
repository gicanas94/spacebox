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

Auth::routes();

Route::get('/', 'IndexController@returnView')->name('index');
Route::get('faq', 'FaqController@returnView')->name('faq');
Route::get('terms', 'TermsController@returnView')->name('terms');

Route::get('search', 'SearchController@findSpacebox')->name('search');
Route::get('filter', 'FilterController@filter')->name('filter');

Route::get('account', 'AccountController@index')->name('account');
Route::get('account/edit', ['as' => 'account.edit', 'uses' => 'AccountController@edit'])->middleware('userIsBanned');
Route::post('account/update', ['as' => 'account.update', 'uses' => 'AccountController@update']);

Route::get('editspace', 'EditSpaceController@index')->name('editspace');
Route::get('editspace/edit', ['as' => 'editspace.edit', 'uses' => 'EditSpaceController@edit'])->middleware('spaceboxIsBanned', 'userIsBanned');
Route::post('editspace/update', ['as' => 'editspace.update', 'uses' => 'EditSpaceController@update']);

Route::get('admin', 'AdminController@index')->name('admin');
Route::post('admin/banuser', ['as' => 'admin.banUser', 'uses' => 'AdminController@banUser']);
Route::post('admin/banspacebox', ['as' => 'admin.banSpacebox', 'uses' => 'AdminController@banSpacebox']);
Route::post('admin/unbanuser', ['as' => 'admin.unbanUser', 'uses' => 'AdminController@unbanUser']);
Route::post('admin/unbanspacebox', ['as' => 'admin.unbanSpacebox', 'uses' => 'AdminController@unbanSpacebox']);
Route::post('admin/makeadmin', ['as' => 'admin.makeAdmin', 'uses' => 'AdminController@makeAdmin']);

Route::get('space/{slug}', 'SpaceController@show')->name('space');
Route::post('space/storepost', ['as' => 'space.storePost', 'uses' => 'SpaceController@storePost']);
Route::post('space/destroypost/{id}', ['as' => 'space.destroyPost', 'uses' => 'SpaceController@destroyPost']);
Route::post('space/storecomment', ['as' => 'space.storeComment', 'uses' => 'SpaceController@storeComment']);
Route::post('space/destroycomment/{id}', ['as' => 'space.destroyComment', 'uses' => 'SpaceController@destroyComment']);

Route::resource('createspace', 'CreateSpaceController', ['only' => ['index', 'store']]);
