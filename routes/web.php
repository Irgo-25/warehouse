<?php

use App\Livewire\Barang\EditBarang;
use App\Livewire\Barang\ListBarang;
use App\Livewire\BarangKeluar\ListBarangKeluar;
use App\Livewire\BarangMasuk\EditBarangMasuk;
use App\Livewire\BarangMasuk\ListBarangMasuk;
use App\Livewire\User\EditUser;
use App\Livewire\User\IndexUser;
use App\Livewire\User\CreateUser;
use App\Livewire\Kategori\Kategori;
use Illuminate\Support\Facades\Route;
use App\Livewire\Kategori\CreateKategori;
use App\Livewire\Kategori\EditKategori;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard.dashboard');
});

// Route::controller(UserController::class)->group(function () {
//     Route::get('user', 'index')->name('indexUser');
//     Route::get('create-user', 'addUser')->name('createUser');
//     Route::get('edit-user/{$id}', 'addUser')->name('editUser');
// });
Route::get('user', IndexUser::class)->name('user');
Route::get('create-user', CreateUser::class)->name('createUser');
Route::get('edit-user/{id}', EditUser::class)->name('editUser');

//route kategori
Route::get('kategori-barang', Kategori::class)->name('kategoriBarang');
Route::get('kategori-barang/create', CreateKategori::class)->name('addKategori');
Route::get('kategori-barang/edit/{id_category}', EditKategori::class)->name('editKategori');

// route ListBarang
Route::get('list-barang', ListBarang::class)->name('listBarang');
Route::get('edit-barang/{kode_barang}', EditBarang::class)->name('editBarang');

// route Barang Masuk
Route::get('barang-masuk', ListBarangMasuk::class)->name('listBarangMasuk');
Route::get('edit-barang-masuk/{id_barang_masuk}', EditBarangMasuk::class)->name('editBarangMasuk');

// Route Barang Keluar
Route::get('barang-keluar', ListBarangKeluar::class)->name('listBarangKeluar');