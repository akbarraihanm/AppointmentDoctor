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
Route::post('/daftar','PasienController@tambahData');
Route::delete('/hapus/{id}', 'PasienController@deleteData');

Route::get('/dokter','DokterController@dataDokter');
Route::get('/edit/{id}','DokterController@edit');
Route::delete('/deleteData/{id}','DokterController@deleteData');
Route::put('/updateData/{id}','DokterController@updateData');
Route::post('/addData','DokterController@storeData');

Route::get('/jadwal/{id}','JadwalController@showJadwalDokter');
Route::get('/jadwal/tambah/{id}','JadwalController@showJadwalDokter2');

Route::get('/history', function () {
    return view('history');
});
