<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Warehouse\WarehouseController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\PhongBanController;
use App\Http\Controllers\Admin\ChucVuController;
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
// AUTHENTICATION 
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['checklogin'])->group(function() {

    // ADMIN
    Route::middleware(['checkRoleAdmin'])->group(function() {
        Route::prefix('admin')->group(function() {
            Route::get('/', [AdminController::class, 'index'])->name('admin.home');
            
            // Quan ly nhan vien
            Route::get('/nhanvien', [AdminController::class, 'getNhanVienView'])->name('admin.nhanvien');
            Route::post('/nhanvien', [NhanVienController::class, 'createStaff']);

            // Quan ly phong ban
            Route::get('/phongban', [AdminController::class, 'getPhongBanView'])->name('admin.phongban');

            // Quan ly chuc vu
            Route::get('/chucvu', [AdminController::class, 'getChucVuView'])->name('admin.chucvu');
        });
    });

    // WAREHOUSE
    Route::middleware(['checkRoleWareHouse'])->group(function() {
        Route::prefix('warehouse')->group(function() {
            Route::get('/', [WarehouseController::class, 'index'])->name('warehouse.home');
        });
    });
});
