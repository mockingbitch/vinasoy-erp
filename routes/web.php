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
Route::get('/404', [HomeController::class, 'pageNotFound'])->name('404');

Route::middleware(['checklogin'])->group(function() {

    // ADMIN
    Route::middleware(['checkRoleAdmin'])->group(function() {
        Route::prefix('admin')->group(function() {
            Route::get('/', [AdminController::class, 'index'])->name('admin.home');
            
            // Quan ly nhan vien
            Route::get('/nhanvien', [NhanVienController::class, 'list'])->name('admin.nhanvien.list');
            Route::get('/nhanvien/new', [NhanVienController::class, 'getCreateNhanVienView'])->name('admin.nhanvien.create');
            Route::post('/nhanvien/new', [NhanVienController::class, 'createNhanVien']);
            Route::get('/nhanvien/{id}', [NhanVienController::class, 'getUpdateNhanVienView'])->name('admin.nhanvien.update');
            Route::post('/nhanvien/{id}', [NhanVienController::class, 'updateNhanVien']);
            Route::get('/nhanvien/delete/query', [NhanVienController::class, 'deleteNhanVien'])->name('admin.nhanvien.delete');

            // Quan ly phong ban
            Route::get('/phongban', [PhongBanController::class, 'list'])->name('admin.phongban.list');
            Route::get('/phongban/new', [AdminController::class, 'getCreatePhongBanView'])->name('admin.phongban.create');
            Route::post('/phongban/new', [PhongBanController::class, 'createPhongBan']);
            Route::get('/phongban/{id}', [PhongBanController::class, 'getUpdatePhongBanView'])->name('admin.phongban.update');
            Route::post('/phongban/{id}', [PhongBanController::class, 'updatePhongBan']);
            Route::get('/phongban/delete/query', [PhongBanController::class, 'deletePhongBan'])->name('admin.phongban.delete');

            // Quan ly chuc vu
            Route::get('/chucvu', [ChucVuController::class, 'list'])->name('admin.chucvu.list');
            Route::get('/chucvu/new', [AdminController::class, 'getCreateChucVuView'])->name('admin.chucvu.create');
            Route::post('/chucvu/new', [ChucVuController::class, 'createChucVu']);
            Route::get('/chucvu/{id}', [ChucVuController::class, 'getUpdateChucVuView'])->name('admin.chucvu.update');
            Route::post('/chucvu/{id}', [ChucVuController::class, 'updateChucVu']);
            Route::get('/chucvu/delete/query', [ChucVuController::class, 'deleteChucVu'])->name('admin.chucvu.delete');
        });
    });

    // WAREHOUSE
    Route::middleware(['checkRoleWareHouse'])->group(function() {
        Route::prefix('warehouse')->group(function() {
            Route::get('/', [WarehouseController::class, 'index'])->name('warehouse.home');
        });
    });
});
