<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PembayaranSiswaController;
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

//route CRUD SPP
Route::resource('spps', SppController::class);

//ROUTE CRUD ROMBEL/KELAS
Route::resource('rombels', RombelController::class);

//ROUTE CRUD SISWA
Route::resource('siswas', SiswaController::class);

//ROUTE CRUD PEMBAYARAN
Route::resource('pembayarans', PembayaranController::class);

//Route History
// Route::get('history', [App\Http\Controllers\HistoryController::class, 'index']);

// route exprot excel
// Route::get('/history', 'HistoryController@index');
Route::get('historySiswa', [PembayaranSiswaController::class, 'index'])->name('historySiswa');
Route::get('historys', [HistoryController::class, 'index'])->name('historys.index'); 
Route::get('history', [HistoryController::class, 'export_excel'])->name('history.export_excel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pembayarans/get-data/{nisn}', [PembayaranController::class, 'getDataSpp']);





