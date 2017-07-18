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
Route::get('admin', 'AdminController@returnView')->name('admin');
Route::get('search', 'SearchController@findSpacebox')->name('search');
Route::resource('createspace', 'CreateSpaceController');
Route::resource('space', 'SpaceController');
Route::resource('account', 'AccountController');
Route::resource('editspace', 'EditSpaceController');
