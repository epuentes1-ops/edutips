<?php

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Auth;

Route::get('/auth/microsoft', function () {
    return Socialite::driver('microsoft')->redirect();
})->name('login.microsoft');

Route::get('/auth/microsoft/callback', function () {
    $microsoftUser = Socialite::driver('microsoft')->user();

    $user = User::updateOrCreate(
        ['email' => $microsoftUser->getEmail()],
        [
            'name' => $microsoftUser->getName(),
            'email_verified_at' => now(),
        ]
    );

    Auth::login($user);

    return redirect('/dashboard');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('aquiempiezatodo', 'aquiempiezatodo')
    ->middleware(['auth', 'verified'])
    ->name('aquiempiezatodo');

Route::view('tucaminodocente', 'tucaminodocente')
    ->middleware(['auth', 'verified'])
    ->name('tucaminodocente');

Route::view('cajadeherramientas', 'cajadeherramientas')
    ->middleware(['auth', 'verified'])
    ->name('cajadeherramientas');

Route::view('clasesconalma', 'clasesconalma')
    ->middleware(['auth', 'verified'])
    ->name('clasesconalma'); 

Route::view('tupausanecesaria', 'tupausanecesaria')
    ->middleware(['auth', 'verified'])
    ->name('tupausanecesaria');
    
Route::view('aldia', 'aldia')
    ->middleware(['auth', 'verified'])
    ->name('aldia');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

require __DIR__.'/auth.php';
