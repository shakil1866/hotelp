<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;




// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

route::get('/',[AdminController::class, 'home'])->name('home');
// route::get('/home',[AdminController::class, 'index'])->name('home');