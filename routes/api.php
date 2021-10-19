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

Route::resource('users', 'Admin\UserAPIController');

Route::resource('companies', 'Admin\CompanyAPIController');

Route::resource('favorits', 'Admin\FavoritAPIController');

