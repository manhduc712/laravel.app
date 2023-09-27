<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('product', 'ProductController@index')->name('product');

Route::prefix('account')->group(function () {

    Route::get('/', 'AccountController@index')->name('account');

    Route::get('edit/{id}', 'AccountController@edit')->name('account.edit');

    Route::post('update/{id}', 'AccountController@update')->name('account.update');

    Route::get('add', 'AccountController@create')->name('account.add');

    Route::post('newAccount', 'AccountController@store')->name('account.store');

    Route::delete('delete/{id}', 'AccountController@destroy')->name('account.delete');
});

Route::prefix('age')->group(function () {

    Route::get('/', 'AgeController@index')->name('age');

    Route::post('age', 'AgeController@checkAge')->name('age.check');
});

Route::prefix('login')->group(function () {

    Route::get('/', 'AuthController@login')->name('login');

    Route::post('login', 'AuthController@loginUser')->name('login.check');
});