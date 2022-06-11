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

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/gate', 'GateController@index')->name('gate');
Route::post('/gate/store', 'GateController@store');
Route::delete('/gate/{gate}', 'GateController@destroy');
Route::delete('/gate/{gate}', 'GateController@destroy');
Route::get('/gate/{gate}/edit', 'GateController@edit');
Route::patch('/gate/{gate}', 'GateController@update');

Route::get('/rute', 'RouteController@index');
Route::post('/rute/store', 'RouteController@store');
Route::get('/rute/{route}/edit', 'RouteController@edit');
Route::patch('/rute/{route}', 'RouteController@update');
Route::delete('/rute/{route}', 'RouteController@destroy');

Route::get('/kendaraan', 'VehicleController@index');
Route::post('/kendaraan/store', 'VehicleController@store');
Route::get('/kendaraan/{vehicle}/edit', 'VehicleController@edit');
Route::patch('/kendaraan/{vehicle}', 'VehicleController@update');
Route::delete('/kendaraan/{vehicle}', 'VehicleController@destroy');

Route::get('/informasi', 'InformationController@index');
Route::post('/informasi/store', 'InformationController@store');
Route::get('/informasi/{information}/edit', 'InformationController@edit');
Route::patch('/informasi/{information}', 'InformationController@update');
Route::delete('/informasi/{information}', 'InformationController@destroy');

Route::get('/transaksi', 'TransactionController@index');