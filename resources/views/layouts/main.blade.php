<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (session()->has('apiToken'))
        <meta name="api-token" content="{{ session('apiToken') }}">
    @else
        <meta name="api-token" content="">
    @endif

    @if ($cartId = request()->cookie('cart_id'))
        <meta name="cart-id" content="{{ $cartId }}">
    @endif

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="{{ asset('js/tailwindcss.js') }}"></script>
    <script src="{{ asset('js/tailwind.config.js') }}"></script>

    @stack('css')
</head>


<body>
    @php
        if (auth()->check() && empty(request()->cookie('cart_id'))) {
            $userId = auth()->id();
            $carts = App\Models\Cart::where('user_id', $userId)->first();
            $cookie_id = \Str::random(32);
            \Cookie::queue('cart_id', $cookie_id, 60 * 24 * 30);
            if ($carts) {
                $carts->cookie_id = $cookie_id;
                $carts->save();
            }
        } else {
            $cookie = request()->cookie('cart_id');
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
    @include('layouts.footer')
</body>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/helper.js') }}"></script>
@stack('scripts')

</html>




</html>
