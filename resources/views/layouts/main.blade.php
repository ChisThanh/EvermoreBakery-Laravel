<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="{{ asset('js/tailwindcss.js') }}"></script>
    <script src="{{ asset('js/tailwind.config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@uplab/rc-slider@9.3.6/assets/index.min.css" rel="stylesheet">
    @stack('css')
</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>

@stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/@uplab/rc-slider@9.3.6/lib/index.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/framer-motion@11.11.11/dist/framer-motion.min.js"></script>
</html>




</html>
