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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/recipes', 'RecipeController@index');
Route::get('/recipes/{recipe}', 'RecipeController@show');

Route::post('/recipes/{recipe}/ingredients', 'IngredientController@store')->middleware('can:add-ingredient,recipe');
Route::post('/recipes/{recipe}/steps', 'StepController@store')->middleware('can:add-step,recipe');
Route::post('/recipes', 'RecipeController@store')->middleware('auth');
