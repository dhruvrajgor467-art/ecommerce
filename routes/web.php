<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Admin\OrderController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')
->middleware(['auth', 'admin'])
->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // PRODUCT CRUD
    Route::resource('/products', ProductController::class)->names('admin.products');
        
    // Category CRUD
    Route::resource('/categories', CategoryController::class)->names('admin.categories');

    Route::get('/orders', [OrderController::class,'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderController::class,'show'])->name('admin.orders.show');
    Route::post('/orders/{id}/status', [OrderController::class,'updateStatus'])->name('admin.orders.status');

});

Route::middleware(['auth'])->group(function () {

    Route::get('/cart',[CartController::class,'index'])
        ->name('cart.index');

    Route::post('/cart/add/{id}',[CartController::class,'add'])
        ->name('cart.add');

    Route::post('/cart/update/{id}',[CartController::class,'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{id}',[CartController::class,'remove'])
        ->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

});

Route::get('/order/success/{id}', function ($id) {

    return view('frontend.checkout.success', compact('id'));

})->name('order.success');

require __DIR__.'/auth.php';