<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Warehouse\WarehouseController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\PhongBanController;
use App\Http\Controllers\Admin\ChucVuController;
use App\Http\Controllers\Admin\HopDongLaoDongController;
use App\Http\Controllers\Admin\LuongController;
use App\Http\Controllers\Admin\KyLuatKhenThuongController;
use App\Http\Controllers\Warehouse\NhaCungCapController;
use App\Http\Controllers\Warehouse\DanhMucController;
use App\Http\Controllers\Warehouse\SanPhamController;
use App\Http\Controllers\Warehouse\NhapXuatController;

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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
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
            Route::get('/listnhanviensuggest', [NhanVienController::class, 'getListNhanVienSuggest'])->name('getListNhanVienSuggest');

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

            // Quan ly hop dong 
            Route::get('/hopdong/{id}', [HopDongLaoDongController::class, 'getHopDongView'])->name('admin.hopdong');
            Route::post('/hopdong/{id}', [HopDongLaoDongController::class, 'createOrUpdateHopDong']);

            //Quan ly luong
            Route::get('/luong', [LuongController::class, 'getListView'])->name('admin.luong.list');
            // Route::get('/luong/{id}', [LuongController::class, 'getChiTietView'])->name('admin.luong.list');

            //Quan ly ky luat khen thuong
            Route::get('/thuongphat', [KyLuatKhenThuongController::class, 'getListView'])->name('admin.klkt.list');
            Route::get('/thuongphat/new', [KyLuatKhenThuongController::class, 'getCreateThuongPhatView'])->name('admin.klkt.create');
            Route::post('/thuongphat/new', [KyLuatKhenThuongController::class, 'create']);
            Route::get('/thuongphat/delete/query', [KyLuatKhenThuongController::class, 'deleteKlkt'])->name('admin.klkt.delete');
        });
    });

    // WAREHOUSE
    Route::middleware(['checkRoleWareHouse'])->group(function() {
        Route::prefix('warehouse')->group(function() {
            Route::get('/', [WarehouseController::class, 'index'])->name('warehouse.home');

            // Quan ly nha cung cap
            Route::get('/nhacungcap', [NhaCungCapController::class, 'list'])->name('warehouse.nhacungcap.list');
            Route::get('/nhacungcap/new', [NhaCungCapController::class, 'getCreateView'])->name('warehouse.nhacungcap.create');
            Route::post('/nhacungcap/new', [NhaCungCapController::class, 'create']);
            Route::get('/nhacungcap/{id}', [NhaCungCapController::class, 'getUpdateView'])->name('warehouse.nhacungcap.update');
            Route::post('/nhacungcap/{id}', [NhaCungCapController::class, 'update']);
            Route::get('/nhacungcap/delete/query', [NhaCungCapController::class, 'delete'])->name('warehouse.nhacungcap.delete');

            //Quan ly danh muc
            Route::get('/danhmuc', [DanhMucController::class, 'list'])->name('warehouse.danhmuc.list');
            Route::get('/danhmuc/new', [DanhMucController::class, 'getCreateView'])->name('warehouse.danhmuc.create');
            Route::post('/danhmuc/new', [DanhMucController::class, 'create']);
            Route::get('/danhmuc/{id}', [DanhMucController::class, 'getUpdateView'])->name('warehouse.danhmuc.update');
            Route::post('/danhmuc/{id}', [DanhMucController::class, 'update']);
            Route::get('/danhmuc/delete/query', [DanhMucController::class, 'delete'])->name('warehouse.danhmuc.delete');

            //Quan ly san pham
            Route::get('/sanpham', [SanPhamController::class, 'list'])->name('warehouse.sanpham.list');
            Route::get('/sanpham/new', [SanPhamController::class, 'getCreateView'])->name('warehouse.sanpham.create');
            Route::post('/sanpham/new', [SanPhamController::class, 'create']);
            Route::get('/sanpham/{id}', [SanPhamController::class, 'getUpdateView'])->name('warehouse.sanpham.update');
            Route::post('/sanpham/{id}', [SanPhamController::class, 'update']);
            Route::get('/sanpham/delete/query', [SanPhamController::class, 'delete'])->name('warehouse.sanpham.delete');
            Route::get('/listSanPhamSuggest', [SanPhamController::class, 'getListSanPhamSuggest'])->name('getListSanPhamSuggest');

            //Quan ly nhap xuat
            Route::get('/nhapxuat', [NhapXuatController::class, 'list'])->name('warehouse.nhapxuat.list');
            Route::get('/nhapxuat/new', [NhapXuatController::class, 'getCreateView'])->name('warehouse.nhapxuat.create');
            Route::post('/nhapxuat/new', [NhapXuatController::class, 'create']);
            Route::get('/nhapxuat/{id}', [NhapXuatController::class, 'getUpdateView'])->name('warehouse.nhapxuat.update');
            Route::post('/nhapxuat/{id}', [NhapXuatController::class, 'update']);
            Route::get('/nhapxuat/delete/query', [NhapXuatController::class, 'delete'])->name('warehouse.nhapxuat.delete');
        });
    });
});
