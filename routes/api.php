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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::group(['prefix' => 'admin'], function () {
//     Route::resource('users', App\Http\Controllers\API\Admin\UserAPIController::class);
// });


// Route::group(['prefix' => 'admin'], function () {
//     Route::resource('companies', App\Http\Controllers\API\Admin\CompanyAPIController::class);
// });


// Route::group(['prefix' => 'admin'], function () {
//     Route::resource('favorits', App\Http\Controllers\API\Admin\FavoritAPIController::class);
// });

Route::group(['prefix' => 'users', 'middleware' => 'CORS'], function ($router) {
    Route::post('/register', 'Admin\UserAPIController@register')->name('register.user');
    Route::post('/login', 'Admin\UserAPIController@login')->name('login.user');
    Route::post('/mark-company', 'Admin\UserAPIController@AddFavorit');
    Route::post('/unmark-company', 'Admin\UserAPIController@DeleteFavorit');
    Route::get('/list-favorit', 'Admin\UserAPIController@ListFavorit');
    Route::get('/view-profile', 'Admin\UserAPIController@viewProfile')->name('profile.user');
    Route::get('/logout', 'Admin\UserAPIController@logout')->name('logout.user');
    Route::post('/search-company', 'Admin\UserAPIController@SearchCompany');

    });

// Route::resource('users', 'Admin\UserAPIController');

Route::resource('companies', 'Admin\CompanyAPIController');

Route::resource('favorits', 'Admin\FavoritAPIController');

// Route::post("user-signup", "Admin\UserAPIController@userSignUp");

// Route::post("user-login", "Admin\UserAPIController@userLogin");

// Route::get("user/{email}", "Admin\UserAPIController@userDetail");



