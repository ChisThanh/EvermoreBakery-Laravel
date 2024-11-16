<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{ session('apiToken') ?? '' }}">
    <meta name="cart-id" content="{{ request()->cookie('cookie_id') ?? '' }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @auth
        <meta name="chat-id" content="{{ auth()->user()->chat_id ?? '' }}">
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script src="{{ asset('js/pusher.js') }}"></script>
    @endauth

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="{{ asset('js/tailwindcss.js') }}"></script>
    <script src="{{ asset('js/tailwind.config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @livewireStyles
    @stack('css')
</head>


<body>
    @php
        if (auth()->check() && empty(request()->cookie('cookie_id'))) {
            $userId = auth()->id();
            $carts = App\Models\Cart::where('user_id', $userId)->first();
            $cookie_id = \Str::random(32);
            \Cookie::queue('cookie_id', $cookie_id, 60 * 24 * 30);
            if ($carts) {
                $carts->cookie_id = $cookie_id;
                $carts->save();
            }
        } else {
            $cookie = request()->cookie('cookie_id');
            $carts = App\Models\Cart::where('cookie_id', $cookie)->first();
            if (auth()->check() && $carts) {
                $carts->user_id = auth()->id();
                $carts->save();
            }
        }
        $cartDetails = [];
        if ($carts) {
            $cartDetails = json_decode($carts->cart_details, true) ?? [];
        }
    @endphp
    @include('layouts.header')
    @yield('content')
    @include('layouts.chatbot')
    @include('layouts.footer')
    @livewireScripts
</body>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/helper.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@stack('scripts')

</html>
