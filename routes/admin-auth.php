<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PharmacyController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\MessageController;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

  
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
   
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['verified'])->name('dashboard');

   
    

    Route::resource('Messages', MessageController::class);
    
    Route::resource('Pharmacies', PharmacyController::class);
    Route::post('update_status', [PharmacyController::class, 'update_status'])->name('update_status');
    Route::post('update_password', [PharmacyController::class, 'update_password'])->name('update_password');
    Route::get('disable_pharmacy',[PharmacyController::class, 'disable_pharmacy'])->name('disable_pharmacy');

    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
