<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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
Auth::routes();

//Dashboard
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//end Dashbord

//Obats
Route::resource('/obat',ObatController::class)->middleware('auth');
Route::post('/obat/tambah',[ObatController::class,'detail'])->name('detail.show')->middleware('auth');
//End Obats

//Kategori
Route::resource('/kategori',KategoriController::class)->middleware('auth');
Route::post('/kategori/saveData' , [KategoriController::class , 'saveData'])->name("update_save")->middleware('auth');
Route::post('/kategori/delete' , [KategoriController::class , 'delete_data'])->name("delete_data_2")->middleware('auth');
//End Kategori

//Buyer
Route::resource('/buyer' , UserController::class)->middleware('auth');
//EndBuyer

//Supplier
Route::resource('/supplier' , SupplierController::class)->middleware('auth');
//EndSupplier

//Laporan
Route::resource('/penjualan' , TransaksiController::class)->middleware('auth');
Route::post('/penjualan',[TransaksiController::class,'showAjax'])->name('dash.showInfo');
//EndLaporan

