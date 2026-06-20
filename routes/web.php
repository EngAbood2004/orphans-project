<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrphanRegistrationController;

Route::get('/', [OrphanRegistrationController::class, 'create'])->name('register');
Route::post('/register', [OrphanRegistrationController::class, 'store'])->name('register.store');
Route::get('/list', [OrphanRegistrationController::class, 'index'])->name('list');
