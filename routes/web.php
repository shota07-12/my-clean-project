<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// お問い合わせフォーム関連
Route::get('/', [ContactController::class, 'index']);
// お問い合わせフォーム
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
// 確認ページ
Route::post('/thanks', [ContactController::class, 'store']); // 送信完了ページ

// 管理画面
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');