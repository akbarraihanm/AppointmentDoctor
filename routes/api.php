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

Route::post('72318591234/dokter/login','DokterController@login');
Route::get('72318591234/dokter','DokterController@index');
Route::get('72318591234/dokterpoli/','DokterController@show');
Route::get('72318591234/dokterid','DokterController@showIdDokter');
Route::get('72318591234/dokter/logout', 'DokterController@logout');
Route::put('72318591234/dokterid','DokterController@updateByIdDokter');
Route::put('72318591234/dokter/token','DokterController@updateByNoTelp');

Route::post('72318591234/pasien/login','PasienController@login');
Route::get('72318591234/pasien/logout','PasienController@logout');
Route::get('72318591234/pasien','PasienController@index');
Route::get('72318591234/pasienid','PasienController@show');
Route::put('72318591234/pasienid','PasienController@update');
Route::put('72318591234/pasien/token','PasienController@updateByNoRm');
Route::delete('72318591234/pasienid','PasienController@destroy');

Route::post('72318591234/jadwal','JadwalController@store');
Route::get('72318591234/jadwal','JadwalController@index');
Route::get('72318591234/jadwalid','JadwalController@show');
Route::get('72318591234/jadwal/tgl','JadwalController@showByJadwal');
Route::delete('72318591234/jadwalid','JadwalController@destroy');
Route::get('72318591234/jadwaldokter','JadwalController@showByDokterId');

Route::post('72318591234/appo','AppoController@store');
Route::get('72318591234/appo','AppoController@index');
Route::get('72318591234/appo/id','AppoController@showByAppoId');
Route::get('72318591234/appo/pasien','AppoController@showByPasienId');
Route::get('72318591234/appo/dokter','AppoController@showByDokterId');
Route::get('72318591234/appo/jadwal','AppoController@showByJadwalId');
Route::get('72318591234/appo/status','AppoController@showByStatus');
Route::put('72318591234/appo/update','AppoController@update');
Route::delete('72318591234/appo/delete','AppoController@destroy');
