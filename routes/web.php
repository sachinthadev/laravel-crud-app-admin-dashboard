<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JointController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('admin/admindashboard', [HomeController::class, 'index']);
    
    Route::get('products', [ProductController::class, 'index'])->name('products');

    Route::get('create', [ProductController::class, 'create'])->name('create');

    Route::Post('save', [ProductController::class, 'save'])->name('save');

    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');

    Route::put('edit/{id}', [ProductController::class, 'update'])->name('update');

    Route::get('delete{id}', [ProductController::class, 'delete'])->name('delete');

    Route::get('joint', [JointController::class, 'index'])->name('joint');

});

require __DIR__.'/auth.php';



// Route::get('admin/admindashboard', [HomeController::class, 'index'])
//     ->middleware(['auth', 'admin']);
    
