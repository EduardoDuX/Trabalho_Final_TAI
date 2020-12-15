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

Route::post('/passagem/store', 'PassagemApiController@store');

Route::get('/passagem', 'PassagemApiController@index');

Route::put('/passagem/update/{id}', 'PassagemApiController@update');

Route::get('/passagem/{id}', 'PassagemApiController@show');

Route::delete('/passagem/{id}', 'PassagemApiController@destroy');

Route::post('/passagem/search', 'PassagemApiController@search');
