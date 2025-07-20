<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PublicProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\AdminCustomOrderController;
use Illuminate\Support\Facades\Artisan;


// Halaman Publik
Route::get('/', [PageController::class, 'home']);
Route::get('/tentang', [PageController::class, 'tentang']);
Route::get('/kontak', [PageController::class, 'kontak']);

Route::get('/produk', [PublicProdukController::class, 'index'])->name('produk.public.index');
Route::get('/produk/{id}', [PublicProdukController::class, 'show'])->name('produk.show');

// Custom Order
Route::get('/custom', [CustomOrderController::class, 'index'])->name('custom');
Route::post('/custom/submit', [CustomOrderController::class, 'submit'])->name('custom.submit');

// Halaman Setelah Login (User Biasa)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        $user = Auth::user();
        return $user->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : view('dashboard');
    })->middleware(['verified'])->name('dashboard');
});

// Halaman Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/produk', ProdukController::class);
    Route::get('/custom-orders', [AdminCustomOrderController::class, 'index'])->name('custom_orders');
});
Route::get('/', function () {
    return [
        'env_key' => env('APP_KEY'),
        'config_key' => config('app.key')
    ];
})

Route::get('/clear-config', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'Config & cache cleared!';
});

require __DIR__.'/auth.php';
