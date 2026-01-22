<?php

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\SAMLController;
use App\Http\Controllers\SectionRatingController;

Route::prefix('saml')->group(function () {

    // SP → IdP (enviar al login de Microsoft)
    Route::get('/login', [SAMLController::class, 'login'])->name('saml.login');

    // ACS (Assertion Consumer Service)
    Route::post('/acs', [SAMLController::class, 'acs'])->name('saml.acs');

    // Metadata (para TI / Azure)
    Route::get('/metadata', [SAMLController::class, 'metadata'])->name('saml.metadata');

    // Logout SP
    Route::get('/logout', [SAMLController::class, 'logout'])->name('saml.logout');

    // Logout IdP → SP
    Route::get('/sls', [SAMLController::class, 'sls'])->name('saml.sls');
});

// Route::get('/auth/microsoft', function () {
//     return Socialite::driver('microsoft')->redirect();
// })->name('login.microsoft');

// Route::get('/auth/microsoft/callback', function () {
//     $microsoftUser = Socialite::driver('microsoft')->user();

//     $user = User::updateOrCreate(
//         ['email' => $microsoftUser->getEmail()],
//         [
//             'name' => $microsoftUser->getName(),
//             'email_verified_at' => now(),
//         ]
//     );

//     Auth::login($user);

//     return redirect('/aquiempiezatodo');
// });

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

// Route::view('comovantusestudiantes', 'comovantusestudiantes')
//     ->middleware(['auth', 'verified'])
//     ->name('comovantusestudiantes');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    // Volt::route('settings/password', 'settings.password')->name('password.edit');
    
});


// --- Sección para manejar las calificaciones de secciones por parte de los usuarios autenticados---

    // ruta para almacenar la calificación de una sección
Route::post('/section-rating', [SectionRatingController::class, 'store'])
    ->middleware('auth') 
    ->name('section-rating.store');

    // ruta para obtener la calificación de una sección
Route::get('/section-rating', [SectionRatingController::class, 'show'])
    ->middleware('auth')
    ->name('section-rating.show');

require __DIR__ . '/auth.php';
