<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
$groupData = [
    'prefix' => ''
];

// route to home page
Route::group($groupData, function () {
    $methods = [
        'index'
    ];
    Route::resource('/', 'HomePageController')->only($methods)->names('home');
});

//route to short url
Route::get('/{token}', 'HomePageController@shortUrlProcess');

//route to get short url
Route::post('/getShortUrl', 'HomePageController@getShortUrl')->name('getShortUrl');