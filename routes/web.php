<?php

use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::post('login', 'AdminController@login')->name('login');
    Route::get('logout', 'AdminController@logout')->name('logout');
});

Route::prefix('dashboard')->name('dashboard.')->group(function() {
    Route::get('/', 'DashboardController@index')->name('index');
});

Route::prefix('market')->name('market.')->group(function() {
    Route::get('/', 'MarketController@index')->name('index');
    Route::get('add', 'MarketController@add')->name('add');
    Route::post('insert', 'MarketController@insert')->name('insert');
    Route::get('edit/{id}', 'MarketController@edit')->name('edit');
    Route::post('update', 'MarketController@update')->name('update');
    Route::get('delete/{id}', 'MarketController@delete')->name('delete');
});

Route::prefix('user')->name('user.')->group(function() {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('verify/{id}', 'UserController@verify')->name('verify');
    Route::get('delete/{id}', 'UserController@delete')->name('delete');
});