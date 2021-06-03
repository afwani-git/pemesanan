<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\PemesananController;
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

//admin page
Route::prefix("/admin")->group(function () {
    Route::get("/", [AdminController::class, "dashboardPage"])->name("adminPage.main");
    Route::get("/workshop", [AdminController::class, "workshopPage"])->name("adminPage.workshop");
    Route::get("/pemesanan", [AdminController::class, "pemesananPage"])->name("adminPage.pemesanan");
    Route::get("/laporan", [AdminController::class, "laporanPage"])->name("adminPage.laporan");
});

//pendaftaran page
Route::get("/", [PendaftaranController::class, 'pilihanPage']);
Route::get("/daftar/{id}", [PendaftaranController::class, 'daftarPage']);
Route::post("/daftar", [PendaftaranController::class, 'daftar']);


//auth
Route::get("/login", [AuthController::class, 'loginPage'])->name('login');
Route::post("/auth", [AuthController::class, 'loginRequest'])->name("auth.login");
Route::get("/logout", [AuthController::class, 'logout'])->name("auth.logout");


//pemesanan action
Route::name('pemesanan.')->group(function () {
    Route::get('/admin/pemesanan/process/{id}', [PemesananController::class, 'process'])->name('process');
    Route::get('/admin/pemesanan/delete/{id}', [PemesananController::class, 'delete'])->name('delete');
});

//workshop action
Route::name('workshop.')->group(function () {
    Route::post('/admin/wokshop/add', [WorkshopController::class, 'add'])->name('add');
    Route::post('/admin/wokshop/update/{id}', [WorkshopController::class, 'update'])->name('update');
    Route::get('/admin/wokshop/delete/{id}', [WorkshopController::class, 'delete'])->name('delete');
});
