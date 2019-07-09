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
//Appointment
Route::get('/appointment','AdminController@indexWebAppo');
Route::delete('/hapus/appo/{id}','AdminController@deleteAppo');

//HistoryAppointment
Route::get('/history','AdminController@indexHistoryAppo');

//Pasien
Route::get('/pasien','AdminController@dataPasien');
Route::post('/daftar','AdminController@tambahDataPasien');
Route::delete('/hapus/{id}', 'AdminController@deleteDataPasien');

//Poli
Route::post('/addpoli','AdminController@addPoli');
//Dokter
Route::get('/dokter','AdminController@dataDokter');
Route::get('/edit/{id}','AdminController@editDokter');
Route::delete('/hapus/dokter/{id}','AdminController@deleteDataDokter');
Route::put('/updateData/{id}','AdminController@updateDataDokter');
Route::post('/addData','AdminController@storeDataDokter');

//JadwalDokter
Route::get('/jadwal/{id}','AdminController@showJadwalDokter')->name('jadwal');
Route::post('/tambah-jadwal','AdminController@storeDataJadwal');
Route::delete('/hapusJadwal/{id}','AdminController@deleteDataJadwal')->name('hapusJadwal');

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::get('/masuk-admin', 'AdminController@loginPage');
Route::post('/loginpost','AdminController@login');
Route::get('/logout','AdminController@logout');

//Pimpinan
Route::post('/login/pimpinan','PimpinanController@login');
Route::get('/logout/pimpinan','PimpinanController@logout');
Route::get('/masuk-pimpinan','PimpinanController@loginPage');
Route::get('/chart', function(){
   return view('pimpinan.tes');
});
Route::get('/progress','PimpinanController@dataDokter');
Route::get('/progress/dokter/{id}/{month}','PimpinanController@progress');
Route::get('/kunjungan/{month}','PimpinanController@kunjungan');