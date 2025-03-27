<?php

use App\Livewire\MedicineSearch;
use App\Livewire\PharmacyPlaces;
use App\Livewire\MedicineAlternative;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/alternative', function () {
    return view('alternative');
})->middleware(['auth', 'verified'])->name('alternative');
Route::get('/pharmacy', function () {
    return view('pharmacy');
})->middleware(['auth', 'verified'])->name('pharmacy');




Route::post('/medicinesSearch', MedicineSearch::class);
Route::get('/medicinesAlternative', MedicineAlternative::class);
Route::get('/PharmacyPlaces', PharmacyPlaces::class);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
require __DIR__.'/pharmacist-auth.php';


