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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login','ApiController@login');
Route::post('/getuser','ApiController@getUser');
Route::post('/register','ApiController@register');
Route::post('/transaksi/store','ApiController@store');
Route::post('/transaksi/konfirmasi','ApiController@konfirmasi');
Route::post('/topup','ApiController@topup');
Route::post('/saldo','ApiController@saldo');
Route::get('/kendaraan','ApiController@kendaraan');
Route::post('/updateprofile','ApiController@updateProfile');
Route::post('/updatephoto','ApiController@updatePhoto');
Route::post('/riwayat','ApiController@riwayat');
Route::get('/rute','ApiController@rute');
Route::get('/informasi','ApiController@informasi');
Route::post('/gate','ApiController@gate');