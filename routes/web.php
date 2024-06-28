<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('/liste', [IndexController::class,'index']);//creation de la route liste avec le controller index
Route::get('/detail', [ProductController::class, 'index'])->name('products.index');
Route::get('/liste/detail/{id}', [ProductController::class,'show'])->name('products.show');//creation de la route products avec id pour avoir l'identifant unique du produit


require __DIR__.'/auth.php';
