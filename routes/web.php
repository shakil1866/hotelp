<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [AdminController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room'])->name('create_room');

Route::post('/add_room', [AdminController::class, 'add_room'])->name('add_room');

Route::get('/view_room', [AdminController::class, 'view_room'])->name('view _room');

Route::get('/room_edit/{id}', [AdminController::class, 'room_edit'])->name('room.edit');

Route::post('/room_update/{id}', [AdminController::class, 'room_update'])->name('room.update');

Route::get('/room_delete/{id}', [AdminController::class, 'room_delete'])
    ->name('room.delete');

    // home controller
Route::get('/room_details/{id}', [HomeController::class, 'room_details']);   

Route::post('/book_room', [HomeController::class, 'book_room'])->name('book_room');

require __DIR__.'/auth.php';

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return 'Caches cleared and config cached successfully.';
});
