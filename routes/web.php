<?php

use BrightMoon\Support\Facades\Route;
use App\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Điều hướng web
|--------------------------------------------------------------------------
|
| Đây là nơi có thể đăng ký các route cho ứng dụng.
| Đối với chức năng tự động điều hướng cần phải truyền đường dẫn theo cú
| pháp {controller}/{method}/{parameter}/...
| {controller}: tên controller không có phần Controller phía sau
| {method}: tên phương thức của controller để xử lý yêu cầu
| {parameter}: tham số
*/

// Route::default();

Route::get('/', [WelcomeController::class]);
