<?php

use App\Livewire\Dasboard;
use App\Livewire\Auth\Login;
use App\Livewire\Unit\AddUnit;
use App\Livewire\Unit\ListUnit;
use App\Livewire\User\EditUser;
use App\Livewire\User\IndexUser;
use App\Livewire\User\CreateUser;
use App\Livewire\Barang\EditBarang;
use App\Livewire\Barang\ListBarang;
use App\Livewire\Kategori\Kategori;
use Illuminate\Support\Facades\Route;
use App\Livewire\Kategori\EditKategori;
use App\Livewire\Kategori\CreateKategori;
use App\Http\Controllers\LaporanListBarang;
use App\Livewire\Barang\FormBarang;
use App\Livewire\BarangUnit\ListBarangUnit;
use App\Livewire\BarangMasuk\EditBarangMasuk;
use App\Livewire\BarangMasuk\ListBarangMasuk;
use App\Livewire\BarangKeluar\ListBarangKeluar;
use App\Livewire\BarangMasuk\FormAddBarangMasuk;
use App\Livewire\BarangKeluar\FormAddBarangKeluar;
use App\Livewire\Permission\IndexPermission;
use App\Livewire\Roles\CreateRole;
use App\Livewire\Roles\IndexRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/', Login::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('beranda', Dasboard::class)->name('dashboard');
    // user
    Route::get('users', IndexUser::class)->name('user');
    Route::get('tambah-user', CreateUser::class)->name('createUser');
    Route::get('ubah-user/{id}', EditUser::class)->name('editUser');

    // Role
    Route::get('roles', IndexRole::class)->name('role');
    Route::get('tambah-role', CreateRole::class)->name('tambahRole');

    // Permission
    Route::get('permissions', IndexPermission::class)->name('permission');
    //route kategori
    Route::get('kategori-barang', Kategori::class)->name('kategoriBarang');
    Route::get('tambah-kategori', CreateKategori::class)->name('addKategori');
    Route::get('ubah-kategori/{id_kategori}', EditKategori::class)->name('editKategori');
    
    // route Barang
    Route::get('daftar-barang', ListBarang::class)->name('listBarang');
    Route::get('tambah-barang', FormBarang::class)->name('addBarang');
    Route::get('ubah-barang/{kode_barang}', EditBarang::class)->name('editBarang');
    
    // route Barang Masuk
    Route::get('daftar-barang-masuk', ListBarangMasuk::class)->name('listBarangMasuk');
    Route::get('tambah-barang-masuk', FormAddBarangMasuk::class)->name('addBarangMasuk');
    Route::get('ubah-barang-masuk/{id_barang_masuk}', EditBarangMasuk::class)->name('editBarangMasuk');

    // Route Barang Keluar
    Route::get('daftar-barang-keluar', ListBarangKeluar::class)->name('listBarangKeluar');
    Route::get('tambah-barang-keluar', FormAddBarangKeluar::class)->name('addBarangKeluar');
    
    // Route Unit
    Route::get('satuan', ListUnit::class)->name('indexUnit');
    Route::get('tambah-satuan', AddUnit::class)->name('addUnit');
    
    // Route Product Unit
    Route::get('shcema-satuan', ListBarangUnit::class )->name('productUnit');
    
    // Route Export List Barang
    Route::get('laporan-daftar-barang', [LaporanListBarang::class, 'PdfListBarang'])->name('listBarangPdf');

});
