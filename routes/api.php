<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working'
    ]);
});

Route::get('/products',[ProductController::class,'index'])->middleware('auth:sanctum');
Route::post('/products',[ProductController::class,'store']);
Route::get('/products/{product}',[ProductController::class,'show']);
Route::put('/products/{product}',[ProductController::class,'update']);
Route::DELETE('/products/{product}',[ProductController::class,'destroy']);
Route::get('/categories',[CategoryController::class,'index']);
Route::post('/categories',[CategoryController::class,'store']);
Route::get('/categories/{category}',[CategoryController::class,'show']);
Route::put('/categories/{category}',[CategoryController::class,'update']);
Route::DELETE('/categories/{category}',[CategoryController::class,'destroy']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');