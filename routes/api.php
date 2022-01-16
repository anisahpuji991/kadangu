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


Route::get('/users','UserController@index');
Route::post('/user','UserController@store');
Route::put('/user/{id}','UserController@update');
Route::get('/user/{id}','UserController@show');
Route::delete('/user/{id}','UserController@destroy');

Route::get('/artists','ArtistController@index');
Route::post('/artist','ArtistController@store');
Route::put('/artist/{id}','ArtistController@update');
Route::get('/artist/{id}','ArtistController@show');
Route::get('/artist_personas/{id}','ArtistController@show_persona');
Route::delete('/artist/{id}','ArtistController@destroy');

Route::get('/roles','RoleController@index');
Route::post('/role','RoleController@store');
Route::put('/role/{id}','RoleController@update');
Route::get('/role/{id}','RoleController@show');
Route::delete('/role/{id}','RoleController@destroy');

Route::get('/personas','PersonaController@index');

Route::post('/persona','PersonaController@store');
// Route::put('/role/{id}','RoleController@update');
Route::get('/persona/{id}','PersonaController@show');
// Route::delete('/role/{id}','RoleController@destroy');