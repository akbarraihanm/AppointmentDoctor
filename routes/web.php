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

Route::get('/','AppoController@indexWeb');
Route::delete('/hapus/appo/{id}','AppoController@delete');

Route::get('/pasien','PasienController@dataPasien');
Route::post('/daftar','PasienController@tambahData');
Route::delete('/hapus/{id}', 'PasienController@deleteData');

Route::get('/dokter','DokterController@dataDokter');
Route::get('/edit/{id}','DokterController@edit');
Route::delete('/hapus/dokter/{id}','DokterController@deleteData');
Route::put('/updateData/{id}','DokterController@updateData');
Route::post('/addData','DokterController@storeData');

Route::get('/jadwal/{id}','JadwalController@showJadwalDokter')->name('jadwal');
Route::post('/tambah-jadwal','JadwalController@storeData');
Route::delete('/hapusJadwal/{id}','JadwalController@deleteData')->name('hapusJadwal');

Route::get('/history', function () {
    return view('history');
});
