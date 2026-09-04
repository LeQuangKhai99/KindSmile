<?php

use Illuminate\Support\Facades\Route;

// Client Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AppointmentController;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\BranchController as AdminBranchController;
use App\Http\Controllers\Admin\PriceController as AdminPriceController;
use App\Http\Controllers\Admin\PostController as AdminPostController;

// Middleware
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| CLIENT ROUTES (NHA KHOA PARKWAY FRONTEND)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dịch vụ
Route::get('/dich-vu', [ServiceController::class, 'index'])->name('services.index');
Route::get('/dich-vu/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Đội ngũ Bác sĩ
Route::get('/bac-si', [DoctorController::class, 'index'])->name('doctors.index');

// Bảng giá
Route::get('/bang-gia', [PriceController::class, 'index'])->name('price.index');

// Chi nhánh
Route::get('/chi-nhanh', [BranchController::class, 'index'])->name('branches.index');

// Bài viết & Kinh nghiệm
Route::get('/bai-viet', [PostController::class, 'index'])->name('posts.index');
Route::get('/bai-viet/{slug}', [PostController::class, 'show'])->name('posts.show');

// Đặt lịch hẹn
Route::get('/dat-lich-kham', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/dat-lich-kham', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/dat-lich-kham/thanh-cong', [AppointmentController::class, 'success'])->name('appointment.success');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (TRANG QUẢN TRỊ ADMIN)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    // Auth routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected Admin Routes
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // Quản lý Lịch hẹn
        Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('admin.appointments.index');
        Route::get('/appointments/{id}', [AdminAppointmentController::class, 'show'])->name('admin.appointments.show');
        Route::put('/appointments/{id}/status', [AdminAppointmentController::class, 'updateStatus'])->name('admin.appointments.update-status');
        Route::delete('/appointments/{id}', [AdminAppointmentController::class, 'destroy'])->name('admin.appointments.destroy');

        // Quản lý Dịch vụ
        Route::resource('services', AdminServiceController::class, ['as' => 'admin']);

        // Quản lý Bác sĩ
        Route::resource('doctors', AdminDoctorController::class, ['as' => 'admin']);

        // Quản lý Chi nhánh
        Route::resource('branches', AdminBranchController::class, ['as' => 'admin']);

        // Quản lý Bảng giá
        Route::resource('price', AdminPriceController::class, ['as' => 'admin']);

        // Quản lý Bài viết
        Route::resource('posts', AdminPostController::class, ['as' => 'admin']);
    });
});
