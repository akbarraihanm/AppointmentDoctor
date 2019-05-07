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
Route::resource('72318591234/poli','PoliController');
Route::resource('72318591234/dokter','DokterController');
Route::get('72318591234/dokter/id/{id}','DokterController@showIdDokter');
Route::put('72318591234/dokter/id/{id}','DokterController@updateByIdDokter');
Route::resource('72318591234/pasien','PasienController');
Route::resource('72318591234/jadwal','JadwalController');
Route::resource('72318591234/appo','AppoController');
