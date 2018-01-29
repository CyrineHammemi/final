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

Route::get('/', 'GuestController@show');
Route::post('/mail', 'GuestController@mail');
Route::post('/search', 'GuestController@search');
Route::get('/plus','GuestController@plus');


Route::group(['prefix'=>'pp','as'=>'pp'],function(){
    Route::post('create','HomeController@create')->middleware('auth');
    Route::post('edit','HomeController@edit')->middleware('auth');
    Route::post('delete','HomeController@delete')->middleware('auth');
    Route::get('link','HomeController@link')->middleware('auth');
    Route::get('home','HomeController@getAll')->middleware('auth');
    Route::post('search','HomeController@search')->middleware('auth');
    Route::get('del/{id}','HomeController@delphotos')->middleware('auth');
});
