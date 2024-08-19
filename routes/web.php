<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('asset', 'asset')
    ->middleware(['auth'])
    ->name('asset');

Route::view('create-asset', 'asset-create')
    ->middleware(['auth'])
    ->name('asset-create');

require __DIR__ . '/auth.php';
