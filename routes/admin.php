<?php

use App\Http\Controllers\Admin\Auth\AuthLoginController;
use App\Http\Controllers\Admin\ChocoBilly\ProcessChocoBilly\GetProcessChocoBillyController;
use App\Http\Controllers\Admin\ChocoBilly\ProcessChocoBilly\PostProcessChocoBillyController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthLoginController::class,'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthLoginController::class,'loginAction'])->name('admin.loginAction');

Route::middleware(['auth'])->group(function() {
    Route::post('/logout', [AuthLoginController::class,'logOutAction'])->name('admin.auth.out');
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
    //ChocoBilly
    Route::get(
        '/process-choco-billy',
        GetProcessChocoBillyController::class
    )->name('admin.process-choco-billy.showForm');
    Route::post(
        '/process-file',
        PostProcessChocoBillyController::class
    )->name('admin.process-choco-billy.process');
});


