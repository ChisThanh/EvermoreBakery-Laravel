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
                                    placeholder="Search..." type="password">
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
                            placeholder="Search..." type="password"></div>
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
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/airForce1"><img
                                    alt="Air Force 1 cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Air Force 1</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                            <div
                                class="absolute left-6 top-0 rounded-b-lg bg-primary px-3 py-2 text-sm uppercase text-white shadow-md">
                                Just In!</div><button type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/blackLebron"><img
                                    alt="Lebron Black cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Lebron Black</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/brownsb"><img
                                    alt="SB Low Brown cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">SB Low Brown</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/brsb"><img
                                    alt="BRSB cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrsb.fabc76b3.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrsb.fabc76b3.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrsb.fabc76b3.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">BRSB</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="#e94e07" fill="#e94e07" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/dunklow"><img
                                    alt="Dunk Low cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fdunklow.18061fa7.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fdunklow.18061fa7.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fdunklow.18061fa7.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Dunk Low</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="#e94e07" fill="#e94e07" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/lebronxx"><img
                                    alt="Lebron XXL cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flebronxx.f8f8ed59.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flebronxx.f8f8ed59.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flebronxx.f8f8ed59.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Lebron XXL</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                            <div
                                class="absolute left-6 top-0 rounded-b-lg bg-primary px-3 py-2 text-sm uppercase text-white shadow-md">
                                Just In!</div><button type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/metcon5"><img
                                    alt="Metcon 5 cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fmetcon5.104ecaa9.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fmetcon5.104ecaa9.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fmetcon5.104ecaa9.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Metcon 5</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="#e94e07" fill="#e94e07" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/metcon9"><img
                                    alt="Metcon 9 cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fmetcon9.954f2f42.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fmetcon9.954f2f42.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fmetcon9.954f2f42.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Metcon 9</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                            <div
                                class="absolute left-6 top-0 rounded-b-lg bg-primary px-3 py-2 text-sm uppercase text-white shadow-md">
                                Just In!</div><button type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="#e94e07" fill="#e94e07" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/nike_blazer"><img
                                    alt="Nike Blazer cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnike_blazer.1e1b15e6.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnike_blazer.1e1b15e6.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnike_blazer.1e1b15e6.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Nike Blazer</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/redlow"><img
                                    alt="Dunk Low Red cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fredlow.d8dfddcd.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fredlow.d8dfddcd.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fredlow.d8dfddcd.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Dunk Low Red</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="#e94e07" fill="#e94e07" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/slides"><img
                                    alt="Slides cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fslides.413749d0.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fslides.413749d0.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fslides.413749d0.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Slides</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                            <div
                                class="absolute left-6 top-0 rounded-b-lg bg-primary px-3 py-2 text-sm uppercase text-white shadow-md">
                                Just In!</div><button type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/yellowLow"><img
                                    alt="Dunk Low Yellow cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FyellowLow.cc64548d.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FyellowLow.cc64548d.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FyellowLow.cc64548d.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Dunk Low Yellow</h3>
                                <p class="text-neutral-500 block text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-24">
            <div class="container">
                <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-10">
                    <div class="mx-auto mb-2 w-full max-w-3xl text-center">
                        <h2 class="lineHeight text-3xl lg:text-[55px] mb-5 font-medium" style="line-height: 1.2em;">The
                            Official Store of The Amazing Brand</h2>
                        <p class="mt-5 text-neutral-500">We work together with high quality and famous brands around the
                            world</p>
                    </div>
                </div>
                <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                    <div class="rounded-2xl border border-neutral-300 p-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="h-20 w-20 overflow-hidden rounded-lg"><img alt="logo" loading="lazy"
                                        width="225" height="225" decoding="async" data-nimg="1"
                                        class="h-full w-full object-cover object-center"
                                        srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance.5c7d0ea5.png&amp;w=256&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance.5c7d0ea5.png&amp;w=640&amp;q=75 2x"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance.5c7d0ea5.png&amp;w=640&amp;q=75"
                                        style="color: transparent;"></div>
                                <div>
                                    <h3 class="flex items-center gap-1 text-lg font-medium">New Balance <svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 256 256" class="text-blue-600" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z">
                                            </path>
                                        </svg></h3>
                                    <div class="flex items-center gap-1"><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 24 24" class="text-yellow-400" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                            </path>
                                        </svg>
                                        <p class="text-sm">4.9 <span class="text-neutral-500">(10334 Reviews)</span></p>
                                    </div>
                                    <p class="text-sm text-neutral-500">7.2M Followers</p>
                                </div>
                            </div><a
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  border-2 border-primary text-primary"
                                href="https://www.newbalance.com">Visit</a>
                        </div>
                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="440" height="440" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance1.2fe3752d.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance1.2fe3752d.webp&amp;w=1080&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance1.2fe3752d.webp&amp;w=1080&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="440" height="440" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance2.c21ff37e.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance2.c21ff37e.webp&amp;w=1080&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance2.c21ff37e.webp&amp;w=1080&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="440" height="440" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance3.3d2b18a7.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance3.3d2b18a7.webp&amp;w=1080&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance3.3d2b18a7.webp&amp;w=1080&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="440" height="440" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance4.5d035acc.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance4.5d035acc.webp&amp;w=1080&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnew_balance4.5d035acc.webp&amp;w=1080&amp;q=75"
                                    style="color: transparent;"></div>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-neutral-300 p-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="h-20 w-20 overflow-hidden rounded-lg"><img alt="logo" loading="lazy"
                                        width="130" height="130" decoding="async" data-nimg="1"
                                        class="h-full w-full object-cover object-center"
                                        srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass_profile.712e49d8.jpeg&amp;w=256&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass_profile.712e49d8.jpeg&amp;w=384&amp;q=75 2x"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass_profile.712e49d8.jpeg&amp;w=384&amp;q=75"
                                        style="color: transparent;"></div>
                                <div>
                                    <h3 class="flex items-center gap-1 text-lg font-medium">Compass <svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 256 256" class="text-blue-600" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z">
                                            </path>
                                        </svg></h3>
                                    <div class="flex items-center gap-1"><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 24 24" class="text-yellow-400" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                            </path>
                                        </svg>
                                        <p class="text-sm">4.9 <span class="text-neutral-500">(10334 Reviews)</span></p>
                                    </div>
                                    <p class="text-sm text-neutral-500">8.5M Followers</p>
                                </div>
                            </div><a
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  border-2 border-primary text-primary"
                                href="https://www.sepatucompass.com/">Visit</a>
                        </div>
                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="1299" height="1299" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass1.0c3d7a92.jpg&amp;w=1920&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass1.0c3d7a92.jpg&amp;w=3840&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass1.0c3d7a92.jpg&amp;w=3840&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="738" height="738" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass2.2022727b.jpg&amp;w=750&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass2.2022727b.jpg&amp;w=1920&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass2.2022727b.jpg&amp;w=1920&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="1477" height="1477" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass3.a5a66112.png&amp;w=1920&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass3.a5a66112.png&amp;w=3840&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass3.a5a66112.png&amp;w=3840&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="4480" height="4480" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass4.b0ed7c1c.jpg&amp;w=3840&amp;q=75 1x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcompass4.b0ed7c1c.jpg&amp;w=3840&amp;q=75"
                                    style="color: transparent;"></div>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-neutral-300 p-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="h-20 w-20 overflow-hidden rounded-lg"><img alt="logo" loading="lazy"
                                        width="200" height="200" decoding="async" data-nimg="1"
                                        class="h-full w-full object-cover object-center"
                                        srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnike_profile.34f18203.jpg&amp;w=256&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnike_profile.34f18203.jpg&amp;w=640&amp;q=75 2x"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnike_profile.34f18203.jpg&amp;w=640&amp;q=75"
                                        style="color: transparent;"></div>
                                <div>
                                    <h3 class="flex items-center gap-1 text-lg font-medium">Nike <svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 256 256" class="text-blue-600" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z">
                                            </path>
                                        </svg></h3>
                                    <div class="flex items-center gap-1"><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 24 24" class="text-yellow-400" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                            </path>
                                        </svg>
                                        <p class="text-sm">4.9 <span class="text-neutral-500">(10334 Reviews)</span></p>
                                    </div>
                                    <p class="text-sm text-neutral-500">11.2M Followers</p>
                                </div>
                            </div><a
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  border-2 border-primary text-primary"
                                href="https://nike.com">Visit</a>
                        </div>
                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="592" height="592" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FyellowLow.cc64548d.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FyellowLow.cc64548d.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FyellowLow.cc64548d.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="592" height="592" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fredlow.d8dfddcd.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fredlow.d8dfddcd.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fredlow.d8dfddcd.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="592" height="592" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fdunklow.18061fa7.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fdunklow.18061fa7.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fdunklow.18061fa7.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe" loading="lazy"
                                    width="592" height="592" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-bottom"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flebronxx.f8f8ed59.webp&amp;w=640&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flebronxx.f8f8ed59.webp&amp;w=1200&amp;q=75 2x"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flebronxx.f8f8ed59.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-14 flex items-center justify-center"><button
                        class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 ">
                        View
                        More
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
