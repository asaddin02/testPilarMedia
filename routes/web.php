<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Route;

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

// Route User Authentiaction
Route::get('login', function () {
    return view('authentication.login');
})->name('login');
Route::get('register', function () {
    return view('authentication.register');
})->name('register');
Route::post('login', [UserController::class, 'login'])->name('user.login');
Route::post('register', [UserController::class, 'register'])->name('user.register');

Route::middleware(['auth'])->group(function () {
    // Route view Dashboard
    Route::get('/', function () {
        return view('homepage');
    });

    // Route User
    Route::resource('user', UserController::class);

    // Route Fifo & Lifo
    Route::post('fifo',[PenjualanController::class,'fifo'])->name('penjualan.fifo');
    Route::post('lifo',[PenjualanController::class,'lifo'])->name('penjualan.lifo');
    Route::get('gettotalmaks/{namaBarang}',[Penjualan::class,'totalmaks']);

    // Order
    Route::get('order',[OrderController::class,'order']);

    // Logout
    Route::get('logout',[UserController::class,'logout'])->name('logout');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Route Barang
    Route::resource('barang', BarangController::class);
    Route::get('fifo', [BarangController::class,'fifo']);
    Route::get('lifo', [BarangController::class,'lifo']);
});
