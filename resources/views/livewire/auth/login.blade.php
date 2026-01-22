<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('aquiempiezatodo', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6">


    <x-auth-header :title="__('Potencia tu enseñanza con EduTips')" :description="__('👉 Comienza aquí')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('Correo electrónico')" type="email" required autofocus
            autocomplete="email" placeholder="email@example.com" />

        <!-- Password -->
        <div class="relative">
            <flux:input wire:model="password" :label="__('Contraseña')" type="password" required
                autocomplete="current-password" :placeholder="__('Contraseña')" viewable />

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Olvidaste tu contraseña') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Recuerdame')" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                {{ __('Iniciar Sesión') }}
            </flux:button>
        </div>
    </form>

    <div class="flex flex-col gap-6">
        <a href="{{ route('saml.login') }}"
            class="flex items-center justify-center gap-2 w-full px-4 py-2.5
               bg-[#2F2FEE] hover:bg-[#1A1A9E] text-white font-semibold
               rounded-lg shadow-md transition-all duration-300
               focus:ring-2 focus:ring-offset-2 focus:ring-[#2F2FEE]">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 23" class="w-5 h-5 fill-white">
                <path d="M0 0h10.5v10.5H0zM12.5 0H23v10.5H12.5zM0 12.5h10.5V23H0zM12.5 12.5H23V23H12.5z" />
            </svg>

            Iniciar sesión con Microsoft
        </a>
    </div>

    {{-- @if (Route::has('register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('¿No tienes una cuenta?') }}</span>
            <flux:link :href="route('register')" wire:navigate>{{ __('Regístrate') }}</flux:link>
        </div>
    @endif --}}
</div>
