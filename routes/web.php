<?php

use App\Http\Livewire\Admin\Barang\BarangKeluarComponent;
use App\Http\Livewire\Admin\Barang\BarangMasukComponent;
use App\Http\Livewire\Admin\DataMasterAdminComponent;
use App\Http\Livewire\Admin\Produk\ProdukComponent;
use App\Http\Livewire\Admin\Stok\StokComponent;
use App\Http\Livewire\Admin\Stok\StokKeluarComponent;
use App\Http\Livewire\Admin\Stok\StokMasukComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Superadmin\DataMasterComponent;
use App\Http\Livewire\Admin\TransferItemComponent;
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

Route::get('/', function () {
    return view('auth.login');
});

// Umum
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/home',HomeComponent::class)->name('home');
});

// Untuk Admin
Route::middleware(['auth:sanctum','verified','authAdmin'])->group(function(){
    Route::get('/Data-Master-Admin',DataMasterAdminComponent::class)->name('data.master.admin');
    Route::get('/Admin-Produk',ProdukComponent::class)->name('admin.produk');
    Route::get('/Admin-Barang-Masuk',BarangMasukComponent::class)->name('admin.barang.masuk');
    Route::get('/Admin-Barang-Keluar',BarangKeluarComponent::class)->name('admin.barang.keluar');
    // Route::get('/Admin-Stok-Masuk',StokMasukComponent::class)->name('admin.stok.masuk');
    // Route::get('/Admin-Stok-Keluar',StokKeluarComponent::class)->name('admin.stok.keluar');
    Route::get('/Admin-Stok',StokComponent::class)->name('admin.stok');
});

// Untuk User
Route::middleware(['auth:sanctum','verified','authPengguna'])->group(function(){
//
});

// Untuk Superadmin
Route::middleware(['auth:sanctum','verified','authSuperadmin'])->group(function(){
    Route::get('/Data-Master',DataMasterComponent::class)->name('data.master');
});
