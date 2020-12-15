<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){

  Route::get('/aviao', 'AviaoController@index');
  Route::get('/aviao/edit/{id}', 'AviaoController@edit');
  Route::get('/aviao/destroy/{id}', 'AviaoController@destroy');
  Route::post('/aviao/search/', 'AviaoController@search');
  Route::post('/aviao/update/', 'AviaoController@update');
  Route::get('/aviao/create', "AviaoController@create"); // carregar o formulário
  Route::post('/aviao/store', 'AviaoController@store'); // salvar os dados do formulário

  Route::get('/passagem', 'PassagemController@index');
  Route::get('/passagem/edit/{id}', 'PassagemController@edit');
  Route::get('/passagem/destroy/{id}', 'PassagemController@destroy');
  Route::post('/passagem/search/', 'PassagemController@search');
  Route::post('/passagem/update/', 'PassagemController@update');
  Route::get('/passagem/create', "PassagemController@create"); // carregar o formulário
  Route::post('/passagem/store', 'PassagemController@store'); // salvar os dados do formulário

  Route::get('/voo', 'VooController@index');
  Route::get('/voo/edit/{id}', 'VooController@edit');
  Route::get('/voo/destroy/{id}', 'VooController@destroy');
  Route::post('/voo/search/', 'VooController@search');
  Route::post('/voo/update/', 'VooController@update');
  Route::get('/voo/create', "VooController@create"); // carregar o formulário
  Route::post('/voo/store', 'VooController@store'); // salvar os dados do formulário

  Route::get('/cliente', 'ClienteController@index');
  Route::get('/cliente/edit/{id}', 'ClienteController@edit');
  Route::get('/cliente/destroy/{id}', 'ClienteController@destroy');
  Route::post('/cliente/search/', 'ClienteController@search');
  Route::post('/cliente/update/', 'ClienteController@update');
  Route::get('/cliente/create', "ClienteController@create"); // carregar o formulário
  Route::post('/cliente/store', 'ClienteController@store'); // salvar os dados do formulário

});
