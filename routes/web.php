<?php

use App\Http\Controllers\ControllerHome;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerMasterConsignee;
use App\Http\Controllers\ControllerMasterCustomer;
use App\Http\Controllers\ControllerMasterDataItem;
use App\Http\Controllers\ControllerMasterJenisBarang;
use App\Http\Controllers\ControllerMasterMerk;
use App\Http\Controllers\ControllerMasterSales;
use App\Http\Controllers\ControllerMasterSatuan;
use App\Http\Controllers\ControllerTransInvoice;
use App\Http\Controllers\ControllerTransRetur;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ControllerLogin::class, 'index'])->name('login');
Route::get('home', [ControllerHome::class, 'index'])->name('home');

Route::get('msales', [ControllerMasterSales::class, 'index'])->name('msales');
Route::get('mcust', [ControllerMasterCustomer::class, 'index'])->name('mcust');
Route::get('mconsign', [ControllerMasterConsignee::class, 'index'])->name('mconsign');
Route::get('mmerk', [ControllerMasterMerk::class, 'index'])->name('mmerk');
Route::get('msatuan', [ControllerMasterSatuan::class, 'index'])->name('msatuan');
Route::get('mjenisbrg', [ControllerMasterJenisBarang::class, 'index'])->name('mjenisbrg');
Route::get('mitem', [ControllerMasterDataItem::class, 'index'])->name('mitem');

Route::get('tinvoice', [ControllerTransInvoice::class, 'index'])->name('tinvoice');
Route::get('tretur', [ControllerTransRetur::class, 'index'])->name('tretur');

// Route::get('/', function () {
//     return view('welcome');
// });
