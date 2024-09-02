<?php

use App\Livewire\AdminCreateUser;
use App\Livewire\AdminUpdateUser;
use App\Livewire\AdminUsers;
use App\Livewire\AssetCreate;
use App\Livewire\PublicAsset;
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

Route::get('view', PublicAsset::class)
    ->name('asset-view');


Route::view('agents', 'public-agents')
    ->name('public-agents');


Route::get('users', AdminUsers::class)
    ->middleware(['auth'])
    ->name('admin-users');

Route::get('users-create', AdminCreateUser::class)
    ->middleware(['auth'])
    ->name('admin-users-create');

Route::get('users-update/{user}', AdminUpdateUser::class)
    ->middleware(['auth'])
    ->name('admin-users-update');



require __DIR__ . '/auth.php';
