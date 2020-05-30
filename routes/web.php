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
    return view('auth.login');
});
Route::get('/indexIPA', 'SiswaIPAController@index')->name('indexIPA');
Route::get('/indexIPA/cari', 'SiswaIPAController@cari')->name('cariSiswaIPA');
Route::post('importIPA', 'SiswaIPAController@import')->name('importIPA');
Route::get('/deleteIPA', 'SiswaIPAController@delete_all')->name('deleteIPA');
Route::get('/formatFileIPA', 'SiswaIPAController@formatFile')->name('formatFileIPA');
Route::get('/trainingIPA', 'SiswaIPAController@showTraining')->name('trainingIPA');
Route::get('/buatPrediksiIPA', 'SiswaIPAController@showBuatPrediksi')->name('prediksiIPA');
Route::post('membuatPrediksiIPA', 'SiswaIPAController@membuatPrediksi')->name('membuatPrediksiIPA');
Route::get('/hasilPrediksiIPA', 'SiswaIPAController@showHasilPrediksi')->name('hasilPrediksiIPA');
Route::get('/daftarPTN_IPA', 'SiswaIPAController@showCariPtn')->name('daftarPTN_IPA');
Route::get('/daftarPTN_IPA/cari', 'SiswaIPAController@cariPtnIPA')->name('cariPTN_IPA');
Route::get('lihatTreeIPA', 'SiswaIPAController@showTree')->name('lihatTreeIPA');
Route::post('membuatTreeIPA', 'SiswaIPAController@membuatTreeIPA')->name('membuatTreeIPA');
Route::get('lihatAkurasiIPA', 'SiswaIPAController@showAkurasi')->name('lihatAkurasiIPA');
Route::post('membuatAkurasiIPA', 'SiswaIPAController@membuatAkurasiIPA')->name('membuatAkurasiIPA');


Route::get('/indexIPS', 'SiswaIPSController@index')->name('indexIPS');
Route::get('/indexIPS/cari', 'SiswaIPSController@cari')->name('cariSiswaIPS');
Route::post('importIPS', 'SiswaIPSController@import')->name('importIPS');
Route::get('/deleteIPS', 'SiswaIPSController@delete_all')->name('deleteIPS');
Route::get('/formatFileIPS', 'SiswaIPSController@formatFile')->name('formatFileIPS');
Route::get('/trainingIPS', 'SiswaIPSController@showTraining')->name('trainingIPS');
Route::get('/buatPrediksiIPS', 'SiswaIPSController@showBuatPrediksi')->name('prediksiIPS');
Route::post('membuatPrediksiIPS', 'SiswaIPSController@membuatPrediksi')->name('membuatPrediksiIPS');
Route::get('/hasilPrediksiIPS', 'SiswaIPSController@showHasilPrediksi')->name('hasilPrediksiIPS');
Route::get('/daftarPTN_IPS', 'SiswaIPSController@showCariPtn')->name('daftarPTN_IPS');
Route::get('/daftarPTN_IPS/cari', 'SiswaIPSController@cariPtnIPS')->name('cariPTN_IPS');
Route::get('lihatTreeIPS', 'SiswaIPSController@showTree')->name('lihatTreeIPS');
Route::post('membuatTreeIPS', 'SiswaIPSController@membuatTreeIPS')->name('membuatTreeIPS');
Route::get('lihatAkurasiIPS', 'SiswaIPSController@showAkurasi')->name('lihatAkurasiIPS');
Route::post('membuatAkurasiIPS', 'SiswaIPSController@membuatAkurasiIPS')->name('membuatAkurasiIPS');


Auth::routes();


