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

Route::group(['prefix' => 'new'], function () {
    Route::get('/index', 'NewFeedController@index')->name('news.index');
    Route::post('/create', 'NewFeedController@store')->name('news.store');
    Route::get('/create','NewFeedController@create')->name('news.create');
    Route::get('/{id}/edit', 'NewFeedController@edit')->name('news.edit');
    Route::post('{id}/update', 'NewFeedController@update')->name('news.update');
    Route::get('/{id}/destroy', 'NewFeedController@destroy')->name('news.destroy');
    Route::get('/{id}/show', 'NewFeedController@show')->name('news.show');
    Route::get('/search', 'NewFeedController@search')->name('news.search');

});
