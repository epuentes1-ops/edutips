<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="{{ asset('images/Logos/faviconEdutips.svg') }}" sizes="32x32">
<link rel="icon" href="{{ asset('images/Logos/faviconEdutips.svg') }}" sizes="192x192">
<link rel="icon" href="{{ asset('images/Logos/faviconEdutips.svg') }}">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
