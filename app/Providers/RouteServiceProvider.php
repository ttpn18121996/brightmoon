<?php

namespace App\Providers;

use BrightMoon\Foundation\Providers\RouteServiceProvider as ServiceProvider;
use BrightMoon\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    // protected $namespace = 'App\Controllers';

    /**
     * Đăng ký route để khởi chạy cho hệ thống.
     *
     * @return mixed
     */
    public function register()
    {
        Route::namespace($this->namespace)->group(base_path('routes/web.php'));
    }

    /**
     * Khởi chạy route.
     *
     * @return mixed
     */
    public function boot()
    {
        parent::boot();
    }
}
