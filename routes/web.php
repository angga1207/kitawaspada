<?php

use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
Route::get('/logout', App\Livewire\Auth\Logout::class)->name('logout');

Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/', App\Livewire\Home::class)->name('home');

    // Profile
    Route::get('/data-usaha', App\Livewire\DataUsaha\Index::class)->name('data-usaha');

    // Profile
    Route::get('/profile', App\Livewire\Auth\Profile::class)->name('profile');
});


Route::impersonate();
