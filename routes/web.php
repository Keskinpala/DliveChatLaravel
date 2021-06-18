<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BtcLoadController;
use App\Http\Controllers\DliveController;
use App\Http\Controllers\IndexController;
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

Route::get('/Bitcoin',[BtcLoadController::class, 'Index'])->name("bitcoinDetay");

Route::get('/DliveYayin',[DliveController::class, 'Index'])->name("DliveYayinEkle");
Route::post('/DliveYayin/Insert', [DliveController::class, 'Stream'])->name("DliveDetayFormSend");

Route::get('/DliveBotDetay',[DliveController::class, 'DliveDetay'])->name("DliveBotDetay");
Route::get('/DliveDetay/GetGun',[DliveController::class, 'GetGun'])->name("DliveDetayGetGun");

Route::get('/DliveDetay',[DliveController::class, 'DliveChat'])->name("DliveChat");

Route::get('/',[IndexController::class, 'Index'])->name("index");