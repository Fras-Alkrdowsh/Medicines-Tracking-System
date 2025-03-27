<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Pharmacist\ProfileController;
use App\Http\Controllers\Pharmacist\CategoryController;

use App\Http\Controllers\Pharmacist\Auth\RegisteredUserController;
use App\Http\Controllers\Pharmacist\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Pharmacist\MedicineController;
use App\Http\Controllers\Pharmacist\MessageController;
use App\Http\Controllers\Pharmacist\ServiceController;

Route::middleware(['guest:pharmacist'])->prefix('pharmacist')->name('pharmacist.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

  
});

Route::middleware(['auth:pharmacist','checkStatus'])->prefix('pharmacist')->name('pharmacist.')->group(function () {
   
    Route::get('/dashboard', function () {
        return view('pharmacist.dashboard');
    })->middleware(['verified'])->name('dashboard');

   

    Route::resource('Messages', MessageController::class);

    Route::resource('Category', CategoryController::class);
    Route::resource('Medicine', MedicineController::class);
    Route::get('assign_alternatives', [MedicineController::class, 'assignAlternatives'])->name('assign_alternatives');
    Route::post('store-alternatives', [MedicineController::class, 'storeAlternatives'])->name('store-alternatives');
    Route::resource('Service', ServiceController::class);
    Route::post('update_status', [ServiceController::class, 'update_status'])->name('update_status');



    


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
