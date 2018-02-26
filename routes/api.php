<?php

use Illuminate\Http\Request;

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

// SPA login route
Route::post('/login', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken')
        ->middleware('client.grants:password', 'client.details')
        ->name('login');

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::get('/user', function (Request $request) {
        return auth()->user();
    });

    Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');
});
