<?php

use App\Http\Controllers\CardMemberController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\obat;
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
Route::post('/obat/tambah',[ObatController::class,'detail'])->name('detail.show')->middleware('isEmployee');
//End Obats

//Kategori
Route::resource('/kategori',KategoriController::class)->middleware('isEmployee');
Route::post('/kategori/saveData' , [KategoriController::class , 'saveData'])->name("update_save")->middleware('isEmployee');
Route::post('/kategori/delete' , [KategoriController::class , 'delete_data'])->name("delete_data_2")->middleware('isEmployee');
//End Kategori

//Buyer
Route::resource('/buyer' , UserController::class)->middleware('isEmployee');
//EndBuyer

//Supplier
Route::resource('/supplier' , SupplierController::class)->middleware('isEmployee');
//EndSupplier

//Laporan
Route::resource('/penjualan' , TransaksiController::class)->middleware('isEmployee');
Route::post('/penjualan',[TransaksiController::class,'showAjax'])->name('dash.showInfo');
//EndLaporan


//Add To Cart
Route::post('/obat/cart',[ObatController::class,'addToCart'])->name('addToCart')->middleware('auth');
Route::get('/obat/cartDelete/{id}',[ObatController::class,'deleteCart'])->name('deleteSession')->middleware('auth');
Route::get('/checkOut',[ObatController::class,'checkOut'])->name('checkOut')->middleware('auth');
//END


//Pembelian
    Route::resource('/pembelian' , TransaksiController::class)->middleware('auth');
//END Pembelian

//Profile
    Route::resource('/profile' , UserController::class)->middleware('auth');
//ENDPROFILE

//Membership
Route::resource('/membership' , CardMemberController::class)->middleware('auth');
//ENDMembership