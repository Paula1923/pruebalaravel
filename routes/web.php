<?php

use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Response;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;

// Front Controllers
use App\Http\Controllers\Front\IndexController;



Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    // Mostrar formulario de login
    Route::get('login', [AdminController::class, 'create'])->name('admin.login');

    // Procesar formulario de login
    Route::post('login', [AdminController::class, 'store'])->name('admin.login.request');
    Route::group(['middleware' => ['admin']], function () {
        // Ruta del dashboard protegida
        Route::resource('dashboard', AdminController::class)->only(['index']);
        // Display Update Password Page
        Route::get('update-password', [AdminController::class, 'edit'])->name('admin.update-password');
        // Very password route
        Route::post('verify-password', [AdminController::class,'verifyPassword'])->name('admin.verify.password');
        //update Password Route
        Route::post('admin/update-password', [AdminController::class, 'updatePasswordRequest'])
        ->name('admin.update-password.request');
        //Admin logout
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');


    });
});

Route::namespace('App\Http\Controllers\Front')->group(function () {
    Route::get('/', [IndexController::class, 'index']);
});

 