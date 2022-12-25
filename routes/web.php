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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

Route::get('/cabinet', 'Cabinet\HomeController@index')->name('cabinet');

/*
Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::get('/', 'HomeController@index')->name('admin.home');
            Route::resource('users', 'UsersController');
        });
    });
});
*/

// laralearn то что выше можно написать иначе:
Route::group(
    [
        'prefix'    => 'admin',
        'as'        => 'admin.', // подставляется в "->name"
        'namespace' => 'Admin',
        'middleware'=> ['auth', 'can:admin-panel'], // can берется из app/Providers/AuthServiceProvider.php
    ],
    function () {
        Route::get('/', 'HomeController@index')->name('home');

        // laralearn генерируем сразу пачку методов (index, create, update и тд)
        Route::resource('users', 'UsersController');
        Route::post('/users/{user}/verify', 'UsersController@verify')->name('users.verify');

        Route::resource('regions', 'RegionController');

        Route::group(['prefix' => 'adverts', 'as' => 'adverts.', 'namespace' => 'Adverts'], function () {
            Route::resource('categories', 'CategoryController');
            Route::post('/categories/{category}/first', 'CategoryController@first')->name('categories.first');
            Route::post('/categories/{category}/up', 'CategoryController@up')->name('categories.up');
            Route::post('/categories/{category}/down', 'CategoryController@down')->name('categories.down');
            Route::post('/categories/{category}/last', 'CategoryController@last')->name('categories.last');
        });
    }
);
