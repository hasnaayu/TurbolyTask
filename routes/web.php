<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\AuthController@login_view')->middleware('guest');
Route::get('/register', 'App\Http\Controllers\AuthController@register_view')->middleware('guest');
Route::namespace('App\Http\Controllers')->group(static function () {
    Route::prefix('auth')->name('auth.')->group(static function () {
        Route::get('/login', 'App\Http\Controllers\AuthController@login_view')->name('login');
        Route::post('/login', 'AuthController@login')->name('login.post');
        Route::post('/register', 'AuthController@register');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    });

    Route::prefix('home')->name('home.')->group(
        static function () {
            Route::middleware('auth')->group(static function () {
                Route::get('/', 'App\Http\Controllers\HomeController@index');
            });
        }
    );

    Route::prefix('task')->name('task.')->group(
        static function () {
            Route::middleware('auth')->group(static function () {
                Route::get('/create', 'App\Http\Controllers\TaskController@create');
                Route::post('/store', 'App\Http\Controllers\TaskController@store');
            });
        }
    );
});
