@extends('layouts.main')
@section('content')
    <div class="">
        <div class="container relative flex flex-col lg:flex-row" id="body">
            <div class="pr-4 pt-10 lg:basis-1/3 xl:basis-1/4">
                <div class="top-28 lg:sticky">
                    <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-0">
                        <div class="max-w-4xl">
                            <h2 class="text-3xl mb-5 font-medium" style="line-height: 1.2em;">Filter products</h2>
                        </div>
                    </div>
                    <div class="divide-y divide-neutral-300">
                        <div class="relative flex flex-col space-y-4 pb-8">
                            <h3 class="mb-2.5 text-xl font-medium">Brands</h3>
                            <div class="grid grid-cols-2 gap-4"><button type="button"
                                    class="rounded-lg py-4 bg-primary text-white">All</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">Nike</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">New Balance</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">Rick Owens</button></div>
                        </div>
                        <div class="relative flex flex-col space-y-4 py-8">
                            <h3 class="mb-2.5 text-xl font-medium">Gender</h3>
                            <div class="grid grid-cols-2 gap-4"><button type="button"
                                    class="rounded-lg py-4 bg-primary text-white">Men</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">Women</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">Unisex</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">Kids</button></div>
                        </div>
                        <div class="relative flex flex-col space-y-5 py-8 pr-3">
                            <div class="space-y-5"><span class="font-semibold">Price range</span>
                                <div class="rc-slider rc-slider-horizontal">
                                    <div class="rc-slider-rail"></div>
                                    <div class="rc-slider-track rc-slider-track-1" style="left: 19.8397%; width: 80.1603%;">
                                    </div>
                                    <div class="rc-slider-step"></div>
                                    <div class="rc-slider-handle rc-slider-handle-1" tabindex="0" role="slider"
                                        aria-valuemin="1" aria-valuemax="500" aria-valuenow="100" aria-disabled="false"
                                        aria-orientation="horizontal" style="left: 19.8397%; transform: translateX(-50%);">
                                    </div>
                                    <div class="rc-slider-handle rc-slider-handle-2" tabindex="0" role="slider"
                                        aria-valuemin="1" aria-valuemax="500" aria-valuenow="500" aria-disabled="false"
                                        aria-orientation="horizontal" style="left: 100%; transform: translateX(-50%);">
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between space-x-5">
                                <div>
                                    <div class="block text-sm font-medium">Min price</div>
                                    <div class="relative mt-1 rounded-md"><span
                                            class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-neutral-500 sm:text-sm">$</span><input
                                            disabled="" id="minPrice"
                                            class="block w-32 rounded-full border-neutral-300 bg-transparent pl-4 pr-10 sm:text-sm"
                                            type="text" value="100" name="minPrice"></div>
                                </div>
                                <div>
                                    <div class="block text-sm font-medium">Max price</div>
                                    <div class="relative mt-1 rounded-md"><span
                                            class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-neutral-500 sm:text-sm">$</span><input
                                            disabled="" id="maxPrice"
                                            class="block w-32 rounded-full border-neutral-300 bg-transparent pl-4 pr-10 sm:text-sm"
                                            type="text" value="500" name="maxPrice"></div>
                                </div>
                            </div>
                        </div>
                        <div class="relative flex flex-col space-y-4 py-8">
                            <h3 class="mb-2.5 text-xl font-medium">Location</h3>
                            <div
                                class="mb-2 flex items-center gap-2 space-y-3 rounded-full border border-neutral-300 px-4 md:flex md:space-y-0">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                    class="text-2xl text-neutral-500" height="1em" width="1em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                    </path>
                                </svg><input
                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-0 py-3 border-transparent bg-transparent placeholder:text-neutral-500 focus:border-transparent"
                                    placeholder="Search..." type="text">
                            </div>
                            <div class="grid grid-cols-2 gap-4"><button type="button"
                                    class="rounded-lg py-4 bg-primary text-white">New York</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">Canada</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">Bangladesh</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">Indonesia</button><button type="button"
                                    class="rounded-lg py-4 bg-gray">San Francisco</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-10 shrink-0 border-t lg:mx-4 lg:mb-0 lg:border-t-0"></div>
            <div class="relative flex-1">
                <div class="top-32 z-10 mb-3 items-center gap-5 space-y-5 bg-white py-10 lg:sticky lg:flex lg:space-y-0">
                    <div class="flex flex-1 items-center gap-2 rounded-full border border-neutral-300 px-4"><svg
                            stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            class="text-2xl text-neutral-500" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                            </path>
                        </svg><input
                            class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-0 py-3 border-transparent bg-transparent placeholder:text-neutral-500 focus:border-transparent"
                            placeholder="Search..." type="text"></div>
                    <div class="flex items-center gap-5"><button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  flex items-center gap-1 bg-gray"><svg
                                stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>Filters</button><button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  flex items-center gap-2 bg-gray">Most
                            popular<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0V0z"></path>
                                <path d="M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z"></path>
                            </svg></button></div>
                </div>
                <div class="grid flex-1 gap-x-8 gap-y-10 sm:grid-cols-2 xl:grid-cols-3 ">
                    @foreach ($data as $each)
                        <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                            <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                <button type="button" onclick="likeProduct('{{ $each['slug'] }}', this)"
                                    data-liked="{{ $each['liked'] }}"
                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        @if ($each['liked'])
                                            <path
                                                d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                stroke="currentColor" fill="#e94e07" stroke-width="0"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        @else
                                            <path
                                                d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                stroke="currentColor" fill="none" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        @endif
                                    </svg>
                                </button>
                                <a class="h-[250px] w-full lg:h-[220px]" href="/products/{{ $each['slug'] }}">
                                    <img alt="Air Force 1 cover photo" loading="lazy" width="592" height="592"
                                        decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                        {{-- src="{{ asset('storage/' . $each['images'][0]['url']) }}" --}} src="{{ asset('images/new_balance3.webp') }}"
                                        style="color: transparent;">
                                </a>
                            </div>
                            <div class="mt-3">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-semibold">{{ $each['name'] }}</h3>
                                    <p class="text-neutral-500 block text-sm line-through">{{ $each['price_sale'] }} Đ</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-neutral-500">{{ $each['category_name'] }}</p>
                                    <p class="text-lg font-medium text-primary">{{ $each['price'] }} Đ</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
