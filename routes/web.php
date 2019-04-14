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
    return view('index');
});
Route::get('/pasien','PasienController@dataPasien');
Route::get('/dokter', function () {
    return view('datadokter');
});
Route::get('/history', function () {
    return view('history');
});
Route::post('/daftar','PasienController@tambahData');
Route::delete('/hapus/{id}', 'PasienController@deleteData');
