<?php

use App\Http\Controllers\WordsController;
use Illuminate\Support\Facades\Route;

Route::controller(WordsController::class)->group(function(){
route::get('/','index')->name('word.index');
route::post('/','store')->name('word.store');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
