<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('page1', 'page1')
    ->middleware(['auth', 'verified'])
    ->name('page1');

Route::view('page2', 'page2')
    ->middleware(['auth', 'verified'])
    ->name('page2');

Route::view('page3', 'page3')
    ->middleware(['auth', 'verified'])
    ->name('page3'); 

Route::view('page4', 'page4')
    ->middleware(['auth', 'verified'])
    ->name('page4');
    
Route::view('page5', 'page5')
    ->middleware(['auth', 'verified'])
    ->name('page5');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

require __DIR__.'/auth.php';
