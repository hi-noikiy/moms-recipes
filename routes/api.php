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

// SPA login routes
Route::post('/login', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken')
        ->middleware('client.grants:password', 'client.details')
        ->name('login');

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', '\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy');

    // CRUD for authorized external clients when a third party wants to access our users their private data.
    Route::post('/oauth/tokens', '\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@forUser');
    Route::post('/oauth/token/create', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    Route::post('/oauth/token/refresh', '\Laravel\Passport\Http\Controllers\TransientTokenController@refresh');
    Route::post('/oauth/tokens/{token_id}/delete', '\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy');
});
