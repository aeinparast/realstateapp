<?php

use App\Http\Controllers\S3Controller;
use App\Livewire\AssetCreate;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('asset', 'asset')
    ->middleware(['auth'])
    ->name('asset');


Route::get('create-asset', AssetCreate::class)
    ->middleware(['auth'])
    ->name('asset-create');




require __DIR__ . '/auth.php';
