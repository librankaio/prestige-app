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
Route::post('/msales/{msale}', [ControllerMasterSales::class, 'update'])->name('msalesupdate');
Route::post('/msales/delete/{msale}', [ControllerMasterSales::class, 'delete'])->name('msalesdelete');

Route::get('mcust', [ControllerMasterCustomer::class, 'index'])->name('mcust');
Route::post('mcustpost', [ControllerMasterCustomer::class, 'post'])->name('mcustpost');
Route::get('/mcust/{mcust}/edit', [ControllerMasterCustomer::class, 'getedit'])->name('mcustgetedit');
Route::post('/mcust/{mcust}', [ControllerMasterCustomer::class, 'update'])->name('mcustupdt');
Route::post('/mcust/delete/{mcust}', [ControllerMasterCustomer::class, 'delete'])->name('mcustdelete');

Route::get('mconsign', [ControllerMasterConsignee::class, 'index'])->name('mconsign');
Route::post('mconsignpost', [ControllerMasterConsignee::class, 'post'])->name('mconsignpost');
Route::get('/mconsign/{mconsign}/edit', [ControllerMasterConsignee::class, 'getedit'])->name('mconsigngetedit');
Route::post('/mconsign/{mconsign}', [ControllerMasterConsignee::class, 'update'])->name('mconsignupdt');
Route::post('/mconsign/delete/{mconsign}', [ControllerMasterConsignee::class, 'delete'])->name('mconsigndelete');

Route::get('mmerk', [ControllerMasterMerk::class, 'index'])->name('mmerk');
Route::post('mmerkpost', [ControllerMasterMerk::class, 'post'])->name('mmerkpost');
Route::get('/mmerk/{mmerk}/edit', [ControllerMasterMerk::class, 'getedit'])->name('mmerkgetedit');
Route::post('/mmerk/{mmerk}', [ControllerMasterMerk::class, 'update'])->name('mmerkupdt');
Route::post('/mmerk/delete/{mmerk}', [ControllerMasterMerk::class, 'delete'])->name('mmerkdelete');

Route::get('msatuan', [ControllerMasterSatuan::class, 'index'])->name('msatuan');
Route::post('msatuanpost', [ControllerMasterSatuan::class, 'post'])->name('msatuanpost');
Route::get('/msatuan/{msatuan}/edit', [ControllerMasterSatuan::class, 'getedit'])->name('msatuanedit');
Route::post('/msatuan/{msatuan}', [ControllerMasterSatuan::class, 'update'])->name('msatuanupdt');
Route::post('/msatuan/delete/{msatuan}', [ControllerMasterSatuan::class, 'delete'])->name('msatuandelete');

Route::get('mjenisbrg', [ControllerMasterJenisBarang::class, 'index'])->name('mjenisbrg');
Route::post('mjenisbrgpost', [ControllerMasterJenisBarang::class, 'post'])->name('mjenisbrgpost');
Route::get('/mjenisbrg/{mjenisbrg}/edit', [ControllerMasterJenisBarang::class, 'getedit'])->name('mjenisbrgedit');
Route::post('/mjenisbrg/{mjenisbrg}', [ControllerMasterJenisBarang::class, 'update'])->name('mjenisbrgupdt');
Route::post('/mjenisbrg/delete/{mjenisbrg}', [ControllerMasterJenisBarang::class, 'delete'])->name('mjenisbrgdelete');

Route::get('mitem', [ControllerMasterDataItem::class, 'index'])->name('mitem');
Route::post('mitempost', [ControllerMasterDataItem::class, 'post'])->name('mitempost');
Route::get('/mitem/{mitem}/edit', [ControllerMasterDataItem::class, 'getedit'])->name('mitemedit');
Route::post('/mitem/{mitem}', [ControllerMasterDataItem::class, 'update'])->name('mitemupdt');
Route::post('/mitem/delete/{mitem}', [ControllerMasterDataItem::class, 'delete'])->name('mitemdelete');

Route::get('tinvoice', [ControllerTransInvoice::class, 'index'])->name('tinvoice');
Route::post('tinvoicepost', [ControllerTransInvoice::class, 'post'])->name('tinvoicepost');
Route::get('/tinvoice/{tinvoice}/edit', [ControllerTransInvoice::class, 'getedit'])->name('tinvoiceedit');
Route::get('tinvoicelist', [ControllerTransInvoice::class, 'list'])->name('tinvoicelist');
Route::post('/tinvoice/{tinvoice}', [ControllerTransInvoice::class, 'update'])->name('tinvoiceupdt');
Route::post('/tinvoice/delete/{tinvoice}', [ControllerTransInvoice::class, 'delete'])->name('tinvoicedelete');

Route::get('tretur', [ControllerTransRetur::class, 'index'])->name('tretur');
Route::post('treturpost', [ControllerTransRetur::class, 'post'])->name('treturpost');
Route::get('treturlist', [ControllerTransRetur::class, 'list'])->name('treturlist');
Route::get('/tretur/{tretur}/edit', [ControllerTransRetur::class, 'getedit'])->name('treturedit');
Route::post('/treturtretur/{treturtretur}', [ControllerTransRetur::class, 'update'])->name('treturupdt');
Route::post('/tretur/delete/{tretur}', [ControllerTransRetur::class, 'delete'])->name('treturdelete');

// Route::get('/', function () {
//     return view('welcome');
// });
