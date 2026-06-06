<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/admin/login', function () {

    return view('admin.login');

})->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login']);

Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');