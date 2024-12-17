<?php

use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
Route::get('/logout', App\Livewire\Auth\Logout::class)->name('logout');

Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/', App\Livewire\Home::class)->name('home');

    // Data Usaha
    Route::get('/data-usaha', App\Livewire\DataUsaha\Index::class)->name('data-usaha');
    Route::get('/data-usaha/{nib}', App\Livewire\DataUsaha\Detail::class)->name('data-usaha.detail');

    // Usaha Dalam Peta
    Route::get('/usaha-dalam-peta', App\Livewire\UsahaDalamPeta\Index::class)->name('usaha-dalam-peta');
    Route::get('/usaha-dalam-peta/{nib}', App\Livewire\UsahaDalamPeta\Detail::class)->name('usaha-dalam-peta.detail');

    // Import
    Route::get('/import', App\Livewire\Import\Index::class)->name('import');

    // Users
    Route::get('/users', App\Livewire\Users\Index::class)->name('users');

    // Profile
    Route::get('/profile', App\Livewire\Auth\Profile::class)->name('profile');
});


Route::impersonate();
