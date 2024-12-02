<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TestController;
use App\Services\TestService;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GCashController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $test = new TestService;
    $chartData = $test->generateSalesReport();

    return Inertia::render('Dashboard', [
        'chartData' => $chartData,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/product', ProductController::class);
    Route::post('product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('products/export', [ProductController::class, 'export'])->name('product.export');
    Route::resource('/sales', SaleController::class);   // bad practice duplicate route hehe
    Route::get('sale/export', [SaleController::class, 'export'])->name('sales.export');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/order', OrderController::class);
    Route::resource('/sales', SaleController::class);

    Route::get('/sales/{sale}/pdf', [SaleController::class, 'pdf'])->name('sales.pdf');
    // // Route::get('/orders', function () {
    // //     return Inertia::render('Orders');
    // })->name('orders');

    Route::post('/gcash/pay', [GCashController::class, 'processPayment']);
    Route::get('/gcash/pay/success', [GCashController::class, 'handleSuccess'])->name('gcash.success');
    Route::get('/gcash/pay/failed', [GCashController::class, 'handleFailed'])->name('gcash.failed');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// create route group for test
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/test', [TestController::class, 'test']);
    Route::get('/test-page', [TestController::class, 'testPage']);
    Route::get('/test-mail', [TestController::class, 'testMail']);
    Route::get('/test-pdf', [TestController::class, 'testPdf']);
});

require __DIR__ . '/auth.php';
