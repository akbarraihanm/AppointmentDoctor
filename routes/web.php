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

Route::get('/appointment','AdminController@indexWebAppo');
Route::delete('/hapus/appo/{id}','AdminController@deleteAppo');

Route::get('/history','AdminController@indexHistoryAppo');

Route::get('/pasien','AdminController@dataPasien');
Route::post('/daftar','AdminController@tambahDataPasien');
Route::delete('/hapus/{id}', 'AdminController@deleteDataPasien');

Route::get('/dokter','AdminController@dataDokter');
Route::get('/edit/{id}','AdminController@editDokter');
Route::delete('/hapus/dokter/{id}','AdminController@deleteDataDokter');
Route::put('/updateData/{id}','AdminController@updateDataDokter');
Route::post('/addData','AdminController@storeDataDokter');

Route::get('/jadwal/{id}','AdminController@showJadwalDokter')->name('jadwal');
Route::post('/tambah-jadwal','AdminController@storeDataJadwal');
Route::delete('/hapusJadwal/{id}','AdminController@deleteDataJadwal')->name('hapusJadwal');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/masuk-admin', 'AdminController@loginPage');
Route::post('/loginpost','AdminController@login');
Route::get('/logout','AdminController@logout');
