<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Simple greeting route
Route::get('/greeting', function () {
    return 'hello world';
});

// User routes
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{user}', [UserController::class, 'show']);

// Product routes // Route สำหรับสินค้า
Route::get('/products', [ProductController::class, 'index']) // แสดงรายการสินค้าทั้งหมด
->middleware(['auth','verified'])->name('products.index'); // แสดงรายการสินค้าทั้งหมด // ต้องล็อกอินและยืนยันอีเมลก่อนเข้าถึง
Route::get('/products/{id}', [ProductController::class, 'show'])
->middleware(['auth','verified'])->name('products.show');
 // Restrict ID to numbers only  // จำกัดให้ id ต้องเป็นตัวเลขเท่านั้น

// Dashboard route // Route สำหรับหน้า Dashboard
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard'); // แสดงหน้า Dashboard
})->middleware(['auth', 'verified'])->name('dashboard');// ต้องล็อกอินและยืนยันอีเมล

// Authenticated routes for profile // Route สำหรับโปรไฟล์ (เฉพาะผู้ที่ล็อกอิน)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
