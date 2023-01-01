<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\HomeController;

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


Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/unauthorized', function () {
    return view('no-auth');
});
Route::get('/order', function () {
    return view('order');
})->middleware(['ortu']);

Route::get('/course', function () {
    return view('course');
});

Route::get('/', [HomeController::class, "index"]);
Route::get('/profile', [HomeController::class, "profile"])->name('profile')->middleware(['ortu']);
Route::post('/update-profile', [HomeController::class, "updateProfile"])->name('updateProfile')->middleware(['ortu']);

Route::middleware(['admin'])->prefix("mapel")->name("mapel.")->controller(MataPelajaranController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/delete', 'destroy')->name('delete');
});

Route::middleware(['admin'])->prefix("kelas")->name("kelas.")->controller(KelasController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/delete', 'destroy')->name('delete');
});

Route::get('/guru/paket', [GuruController::class, "paket"])->name('guru.paket')->middleware(['guru']);
Route::get('/guru/add-paket', [GuruController::class, "createPaket"])->name('guru.createPaket')->middleware(['guru']);
Route::get('/guru/{id}/edit-paket', [GuruController::class, "editPaket"])->name('guru.editPaket')->middleware(['guru']);
Route::get('/guru/{id}/delete-paket', [GuruController::class, "destroyPaket"])->name('guru.destroyPaket')->middleware(['guru']);
Route::post('/guru/store-paket', [GuruController::class, "storePaket"])->name('guru.storePaket')->middleware(['guru']);
Route::post('/guru/{id}/update-paket', [GuruController::class, "updatePaket"])->name('guru.updatePaket')->middleware(['guru']);
Route::post('/guru/update-profile', [GuruController::class, "updateProfile"])->name('guru.updateProfile')->middleware(['guru']);
Route::get('/guru/profile', [GuruController::class, "profile"])->name('guru.profile')->middleware(['guru']);

Route::get('/guru/edit-status/{id}', [GuruController::class, "editStatus"])->name('guru.editStatus')->middleware(['guru']);
Route::get('/guru/pemesanan', [GuruController::class, "pemesanan"])->name('guru.pemesanan')->middleware(['guru']);
Route::post('/guru/update-status/{id}', [GuruController::class, "updateStatus"])->name('guru.updateStatus')->middleware(['guru']);

Route::post('/pemesanan', [PemesananController::class, "store"])->name('pemesanan.store')->middleware(['ortu']);
Route::get('/logout', [AuthController::class, "logout"])->name('logout');
Route::post('/login', [AuthController::class, "login"])->name('login');
Route::post('/register', [AuthController::class, "register"])->name('register');
