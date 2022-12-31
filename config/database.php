<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Database Connection mặc định
    |--------------------------------------------------------------------------
    |
    | Ở đây ta có thể chỉ định ra Database Connection mặc định dùng cho
    | ứng dụng. Dĩ nhiên là ta có thể kết nối tới nhiều cơ sở dữ liệu khác nhau
    | bằng cách dùng các thư viện cấu hình database bên dưới.
    |
    */
    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Danh sách các Database Connections
    |--------------------------------------------------------------------------
    |
    | Đây là thông số cấu hình cho các database connections trong ứng dụng.
    | Dưới đây là ví dụ cho từng database connections mà brightmoon hỗ trợ.
    |
    */
    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', '../database.sqlite'),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => env('DB_DRIVER', 'mysql'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'brightmoon'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'collation' => env('DB_COLLATION', 'utf8_general_ci'),
            'prefix' => env('DB_PREFIX', ''),
            'timezone' => env('DB_TIMEZONE', '+07:00'),
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5433'),
            'database' => env('DB_DATABASE', 'brightmoon'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', '123456'),
            'charset' => 'utf8',
            'prefix' => env('DB_PREFIX', ''),
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'brightmoon'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', '123456'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],
    ],
];
