<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'api'], function() {
    Route::post('auth/login', 'AuthController@login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::post('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
        });
        Route::resource('students','StudentController')->except(['edit','create']);
        Route::get('genres','GeneralController@getGenres');
        Route::get('careers','GeneralController@getCareers');
        Route::get('identification-types','GeneralController@getIdentificationTypes');
    });

});
    