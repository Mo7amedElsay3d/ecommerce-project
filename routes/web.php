<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    //     Route::get('/admin/products', [AdminController::class, 'index'])->name('products.index');
    //     Route::get('/admin/products/create', [AdminController::class, 'create'])
    //         ->name('admin.products.create');
    //     Route::get('/admin/products/{id}', [AdminController::class, 'show'])
    //         ->name('product.show');
    //    Route::put('/admin/products/{id}', [AdminController::class, 'update'])
    //     ->name('product.update');
    //     Route::post('/storeProduct', [AdminController::class, 'store']);
    Route::resource('products', AdminController::class);
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('admin/profile/update', [AdminController::class, 'updateprofile'])->name('admin.profile.update');
    Route::delete('/admin/profile/image', [AdminController::class, 'deleteProfileImage'])
        ->name('admin.profile.image.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// الصفحة الرئيسية
Route::get('/', [FirstController::class, 'MainPages']);

// الأقسام
Route::get('/category', [FirstController::class, 'ShowCategories']);
Route::get('/category/{catid}', [FirstController::class, 'GetCategoryProducts']);

// المنتجات
// Route::get('/product/{id}', [FirstController::class,'GetCategoryProducts']);
Route::get('/product', [FirstController::class, 'getAllProducts']);
Route::get('/singleProduct/{id}', [ProductController::class, 'show'])
    ->name('products.show');
Route::delete('/products/remove/{id}', [ProductController::class, 'destroy'])
    ->name('products.remove');
Route::get('/search', [FirstController::class, 'search'])->name('search');
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::post('/add-to-cart/{id}', [ProductController::class, 'add']);
    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
    Route::delete('/remove-from-cart/{id}', [ProductController::class, 'remove'])
        ->name('cart.remove');
    Route::post('/cart/increase/{id}', [ProductController::class, 'increase'])
        ->name('cart.increase');

    Route::post('/cart/decrease/{id}', [ProductController::class, 'decrease'])
        ->name('cart.decrease');
    Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [ProductController::class, 'placeOrder'])->name('place.order');
    Route::get('/orders', [ProductController::class, 'order'])->name('MyOrder');
});
