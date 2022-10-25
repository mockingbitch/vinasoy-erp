<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
            'NhanVien'
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
        //
    }
}
