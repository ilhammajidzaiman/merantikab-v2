@props(['title' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('metaTag')
    <title>
        {{ Str::ucfirst($title) }}
        {{ $title ? '|' : null }}
        {{ env('APP_NAME') }}
    </title>
    <link rel="shortcut icon" href="{{ asset('/image/logo-meranti.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-slate-50">
    <x-public.layout.navigation />
    {{-- @include('layouts.public.navigation') --}}
    {{ $slot }}
    <x-public.layout.footer />
    {{-- @include('layouts.public.footer') --}}
    @stack('scripts')
    @livewireScripts
</body>

</html>
