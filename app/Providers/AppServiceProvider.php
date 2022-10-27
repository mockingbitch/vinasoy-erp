<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
            'PhongBan'
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
    }
}
