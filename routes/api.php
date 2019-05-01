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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
$apiKey = "72318591234";
Route::resource('{apiKey}/poli','PoliController');
Route::resource('{apiKey}/dokter','DokterController');
Route::get('{apiKey}/dokter/id/{id}','DokterController@showIdDokter');
Route::put('{apiKey}/dokter/id/{id}','DokterController@updateByIdDokter');
Route::resource('{apiKey}/pasien','PasienController');
Route::resource('{apiKey}/jadwal','JadwalController');
Route::resource('{apiKey}/appo','AppoController');
