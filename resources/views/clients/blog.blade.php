@extends('layouts.main')
@section('content')
    <div class="container pb-20 pt-10">
        <div class="container">
            <div class="mb-16 space-y-2">
                <div class="container mt-5">
                    <div class="text-center mb-5">
                        <h2 class="text-3xl font-medium mb-5 leading-tight">
                            Mã Giảm Giá Evermore Bakery
                        </h2>
                    </div>
                    <div class="flex items-center justify-center mb-8">
                        <div class="border-t border-neutral-800 flex-grow"></div>
                        <span class="px-3 text-lg font-semibold text-neutral-800 uppercase">Siêu Ưu Đãi </span>
                        <div class="border-t border-neutral-800 flex-grow"></div>
                    </div>

                </div>
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($coupons as $item)
                        <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                            style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a href="#">
                                <div class="h-[220px] w-full overflow-hidden rounded-xl">
                                    <img alt="blog cover" loading="lazy" width="1000" height="1000" decoding="async"
                                        data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="{{ $item->images->first()->url ?? '' }}" style="color: transparent;">
                                </div>
                            </a>
                            <div class="">
                                <h3 class="card-title text-2xl font-semibold">{{ $item->title }}</h3>
                                <p class="mt-2 text-neutral-500">{{ $item->description }}</p>
                                <p class="mt-2 mb-2 text-neutral-500">Giảm đến 
                                    {{ (int)$item->discount_percentage }}%
                                    hoặc {{ (int)$item->discount_amount }} Đ - SL: {{ $item->quantity }}</p>
                                <div class="absolute bottom-5 left-3 w-full">
                                    <div class="relative">
                                        <p class="cursor-text inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                            href="#">Mã: {{ $item->code }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection