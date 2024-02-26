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
Route::post('msalespost', [ControllerMasterSales::class, 'post'])->name('msalespost');
Route::get('/msales/{msale}/edit', [ControllerMasterSales::class, 'getedit'])->name('msalesgetedit');

Route::get('mcust', [ControllerMasterCustomer::class, 'index'])->name('mcust');
Route::post('mcustpost', [ControllerMasterCustomer::class, 'post'])->name('mcustpost');
Route::get('/mcust/{mcust}/edit', [ControllerMasterCustomer::class, 'getedit'])->name('mcustgetedit');
Route::post('/mcust/{mcust}', [ControllerMasterCustomer::class, 'update'])->name('mcustupdt');

Route::get('mconsign', [ControllerMasterConsignee::class, 'index'])->name('mconsign');
Route::post('mconsignpost', [ControllerMasterConsignee::class, 'post'])->name('mconsignpost');
Route::get('/mconsign/{mconsign}/edit', [ControllerMasterConsignee::class, 'getedit'])->name('mconsigngetedit');
Route::post('/mconsign/{mconsign}', [ControllerMasterConsignee::class, 'update'])->name('mconsignupdt');

Route::get('mmerk', [ControllerMasterMerk::class, 'index'])->name('mmerk');
Route::post('mmerkpost', [ControllerMasterMerk::class, 'post'])->name('mmerkpost');
Route::get('/mmerk/{mmerk}/edit', [ControllerMasterMerk::class, 'getedit'])->name('mmerkgetedit');

Route::get('msatuan', [ControllerMasterSatuan::class, 'index'])->name('msatuan');
Route::post('msatuanpost', [ControllerMasterSatuan::class, 'post'])->name('msatuanpost');
Route::get('/msatuan/{msatuan}/edit', [ControllerMasterSatuan::class, 'getedit'])->name('msatuanedit');

Route::get('mjenisbrg', [ControllerMasterJenisBarang::class, 'index'])->name('mjenisbrg');
Route::post('mjenisbrgpost', [ControllerMasterJenisBarang::class, 'post'])->name('mjenisbrgpost');
Route::get('/mjenisbrg/{mjenisbrg}/edit', [ControllerMasterJenisBarang::class, 'getedit'])->name('mjenisbrgedit');

Route::get('mitem', [ControllerMasterDataItem::class, 'index'])->name('mitem');
Route::post('mitempost', [ControllerMasterDataItem::class, 'post'])->name('mitempost');
Route::get('/mitem/{mitem}/edit', [ControllerMasterDataItem::class, 'getedit'])->name('mitemedit');

Route::get('tinvoice', [ControllerTransInvoice::class, 'index'])->name('tinvoice');
Route::post('tinvoicepost', [ControllerTransInvoice::class, 'post'])->name('tinvoicepost');
Route::get('/tinvoice/{tinvoice}/edit', [ControllerTransInvoice::class, 'getedit'])->name('tinvoiceedit');

Route::get('tretur', [ControllerTransRetur::class, 'index'])->name('tretur');
Route::post('treturpost', [ControllerTransRetur::class, 'post'])->name('treturpost');

// Route::get('/', function () {
//     return view('welcome');
// });
