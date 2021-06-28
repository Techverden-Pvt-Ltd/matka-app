<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', 'LoginController@login')->name('login');
Route::post('register', 'RegisterController@register')->name('register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::name('user.')->group(function() {
        Route::get('getProfile/{id}', 'UserController@getProfile')->name('getProfile');
        Route::post('updateProfile', 'UserController@updateProfile')->name('updateProfile');
    });

    Route::name('wallet.')->group(function() {
        Route::get('getWallet/{userId}', 'WalletController@getWallet')->name('getWallet');
        Route::post('withdrawFunds', 'WalletController@withdrawFunds')->name('withdrawFunds');
        Route::post('addFunds', 'WalletController@addFunds')->name('addFunds');
    });

    Route::name('market.')->group(function() {
        Route::get('getMarkets', 'MarketController@getMarkets')->name('getMarkets');
    });
});