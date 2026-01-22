<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';
    public bool $emailVerified = false;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $user = Auth::user();

        $this->name = (string) ($user->name ?? '');
        $this->email = (string) ($user->email ?? '');
        $this->emailVerified = (bool) ($user->email_verified_at !== null);
    }

    /**
     * Send an email verification notification to the current user.
     * (Se mantiene por si el usuario NO está verificado y el flujo aplica)
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        // Si ya está verificado, redirige al dashboard (misma lógica que tenías)
        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));
            return;
        }

        $user->sendEmailVerificationNotification();
        Session::flash('status', 'verification-link-sent');
    }
};
?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout
        :heading="__('Perfil')"
        :subheading="__('Revisa la información base de tu cuenta. Estos datos no se editan desde aquí.')"
    >
        {{-- Banner informativo: SSO / IdP --}}
        <div class="my-6 w-full">
            <div class="rounded-xl border p-4">
                <div class="flex items-start gap-3">
                    {{-- Icono simple sin dependencia --}}
                    <div class="mt-0.5 select-none">🔐</div>

                    <div class="space-y-1">
                        <flux:text class="font-medium">
                            {{ __('Datos gestionados por el sistema de identidad') }}
                        </flux:text>

                        <flux:text class="text-sm text-gray-500">
                            {{ __('Tu nombre y correo se sincronizan desde el proveedor de identidad (por ejemplo, SSO/Entra ID). Si necesitas un cambio, solicita la actualización al área encargada.') }}
                        </flux:text>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tarjeta Perfil --}}
        <div class="w-full space-y-4">
            <div class="rounded-2xl border p-5">
                <div class="flex items-center justify-between gap-4">
                    <div class="min-w-0">
                        <flux:text class="text-lg font-semibold">
                            {{ __('Información de la cuenta') }}
                        </flux:text>
                        <flux:text class="text-sm text-gray-500">
                            {{ __('') }}
                        </flux:text>
                    </div>

                    {{-- Chip estado correo --}}
                    @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail)
                        @if ($emailVerified)
                            <span class="inline-flex items-center rounded-full border px-3 py-1 text-sm">
                                ✅ {{ __('Email verificado') }}
                            </span>
                        @else
                            <span class="inline-flex items-center rounded-full border px-3 py-1 text-sm">
                                ⚠️ {{ __('Email sin verificar') }}
                            </span>
                        @endif
                    @endif
                </div>

                <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">
                    {{-- Campo: Nombre (solo lectura) --}}
                    <div class="rounded-xl border p-4">
                        <flux:text class="text-sm text-gray-500">
                            {{ __('Nombres') }}
                        </flux:text>

                        <div class="mt-2 flex items-center justify-between gap-3">
                            <flux:text class="font-medium truncate">
                                {{ $name ?: __('No disponible') }}
                            </flux:text>

                            {{-- Copiar --}}
                            {{-- <button
                                type="button"
                                class="rounded-lg border px-3 py-1 text-sm"
                                onclick="navigator.clipboard.writeText(@js($name));"
                                @disabled(empty($name))
                                title="{{ __('Copiar') }}"
                            >
                                {{ __('Copiar') }}
                            </button> --}}
                        </div>
                    </div>

                    {{-- Campo: Email (solo lectura) --}}
                    <div class="rounded-xl border p-4">
                        <flux:text class="text-sm text-gray-500">
                            {{ __('Email') }}
                        </flux:text>

                        <div class="mt-2 flex items-center justify-between gap-3">
                            <flux:text class="font-medium truncate">
                                {{ $email ?: __('No disponible') }}
                            </flux:text>

                            {{-- Copiar --}}
                            {{-- <button
                                type="button"
                                class="rounded-lg border px-3 py-1 text-sm"
                                onclick="navigator.clipboard.writeText(@js($email));"
                                @disabled(empty($email))
                                title="{{ __('Copiar') }}"
                            >
                                {{ __('Copiar') }}
                            </button> --}}
                        </div>

                        {{-- Verificación (si aplica) --}}
                        {{-- @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $emailVerified)
                            <div class="mt-4 space-y-2">
                                <flux:text class="text-sm text-gray-500">
                                    {{ __('Tu dirección de correo no está verificada. Si tu flujo lo requiere, puedes reenviar el correo de verificación.') }}
                                </flux:text>

                                <div class="flex items-center gap-3">
                                    <flux:button
                                        type="button"
                                        wire:click="resendVerificationNotification"
                                        class="w-auto"
                                    >
                                        {{ __('Reenviar verificación') }}
                                    </flux:button>

                                    @if (session('status') === 'verification-link-sent')
                                        <flux:text class="text-sm font-medium !dark:text-green-400 !text-green-600">
                                            {{ __('Se envió un nuevo enlace de verificación a tu correo.') }}
                                        </flux:text>
                                    @endif
                                </div>
                            </div>
                        @endif --}}
                    </div>
                </div>

                {{-- Nota inferior --}}
                {{-- <div class="mt-5 rounded-xl border p-4">
                    <flux:text class="text-sm text-gray-500">
                        {{ __('Tip: si el usuario reporta datos incorrectos, normalmente el ajuste debe hacerse en el directorio/IdP (p. ej., Entra ID) y luego sincronizarse.') }}
                    </flux:text>
                </div> --}}
            </div>
        </div>

        {{-- Si luego quieres habilitar otras secciones editables, puedes agregarlas abajo --}}
        {{-- <livewire:settings.delete-user-form /> --}}
    </x-settings.layout>
</section>
