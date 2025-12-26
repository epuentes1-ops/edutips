<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="icon" href="{{ asset('images/logos_1/faviconEdutips.svg') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('images/logos_1/faviconEdutips.svg') }}" sizes="192x192">
    <link rel="icon" href="{{ asset('images/logos/faviconEdutips.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center justify-content-center bg-dark"
    style="
        background-image: url('{{ asset('images/login_1/log_img2.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
    ">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">

            <!-- Columna botones -->
            <div class="col-12 col-md-6 col-lg-5 d-flex flex-column align-items-center justify-content-center text-center p-4 rounded-4 shadow-lg"
                style="background-color: rgba(255, 255, 255, 0.6);">

                <!-- Logo vertical -->
                <img src="{{ asset('images/logos_1/logocolorVertical.svg') }}" 
                     alt="Logo" 
                     class="img-fluid mb-3"
                     style="max-width: 180px; width: 80%; height: auto;">

                <!-- Título -->
                <h2 class="fw-semibold mb-3">Bienvenidos a</h2>

                <!-- Logo principal -->
                <img src="{{ asset('images/logos_1/LogoEdutips.svg') }}" 
                     alt="Logo2" 
                     class="img-fluid mb-4"
                     style="max-width: 250px; width: 90%; height: auto;">

                <!-- Botones -->
                <div class="w-100" style="max-width: 300px;">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/aquiempiezatodo') }}" class="btn btn-secondary mb-3 w-100">
                                Aquí empieza todo
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-secondary mb-3 w-100">
                                Iniciar Sesión
                            </a>

                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-secondary mb-3 w-100">
                                    Registrar
                                </a>
                            @endif --}}
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Fondo responsive en móviles */
        @media (max-width: 768px) {
            body {
                background-attachment: scroll !important;
                background-size: cover !important;
                background-position: center !important;
            }
        }
    </style>
</body>

</html>
