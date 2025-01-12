<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <x-navbar />
    <x-sidebar />
    <div class="p-4 mt-14 sm:ml-64">
            {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>