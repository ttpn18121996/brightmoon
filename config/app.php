<?php

return [
    'timezone' => 'Asia/Ho_Chi_Minh',
    'aliases' => [
        'DB' => \BrightMoon\Support\Facades\DB::class,
        'Hash' => \BrightMoon\Support\Facades\Hash::class,
        'View' => \BrightMoon\Support\Facades\View::class,
    ],
    'providers' => [
        App\Providers\AppServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ],
];
