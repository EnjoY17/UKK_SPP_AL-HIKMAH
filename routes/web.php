<?php

use App\Http\Controllers\PetugaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembayaranSiswaController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::resource('spps', SppController::class);
Route::resource('rombels', RombelController::class);
Route::resource('siswas', SiswaController::class);
Route::resource('petugas', PetugaController::class);
Route::resource('pembayarans', PembayaranController::class);
Route::resource('historys', HistoryController::class);Route::get('historys', [HistoryController::class, 'index'])->name('historys.index');

Route::get('/history', 'HistorysController@index')->name('history.index');

Route::post('/history/import', 'HistorysController@import')->name('history.import');
//route histrisiswa
Route::get('historySiswa', [PembayaranSiswaController::class, 'index'])->name('historySiswa');
//routehisrorysiswa
Route::get('history', [HistoryController::class, 'export_excel'])->name('history.export_excel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//get nis pembayaaran
Route::get('pembayarans/get-data/{nisn}/{berapa}', [PembayaranController::class, 'getData']);
