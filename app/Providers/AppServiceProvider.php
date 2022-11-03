<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'User',
            'NhanVien',
            'ChucVu',
            'PhongBan',
            'HopDongLaoDong',
            'Luong',
            'KyLuatKhenThuong',
            'NhaCungCap',
            'DanhMuc',
            'SanPham',
            'NhapXuat',
            'ChiTietNhapXuat',
            'Kho'
        ];

        foreach ($models as $model) {
            $this->app->bind("App\Repositories\\Contracts\\Interface\\{$model}RepositoryInterface", "App\Repositories\\Contracts\\Repository\\{$model}Repository");
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('dashboardLayout', function($view) {
            $user = Auth::guard('user')->user();

            view()->share('user', $user);
        });
    }
}
