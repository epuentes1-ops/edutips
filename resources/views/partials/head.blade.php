<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="{{ asset('images/Logos/faviconEdutips.svg') }}" sizes="32x32">
<link rel="icon" href="{{ asset('images/Logos/faviconEdutips.svg') }}" sizes="192x192">
<link rel="icon" href="{{ asset('images/Logos/faviconEdutips.svg') }}">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<!-- Fuente Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body, h1, h2, h3, h4, h5, h6, p, span, div, a, button, input, textarea {
        font-family: 'Poppins', sans-serif !important;
    }
</style>



@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
