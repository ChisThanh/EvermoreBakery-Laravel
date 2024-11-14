@extends('layouts.main')
@section('content')
    <div class="d-flex justify-center align-items-center">
        <div class="w-100">
            <div>
                <div class="my-7">
                    <div class="container items-stretch gap-y-5 lg:flex lg:gap-5 lg:gap-y-0">
                        <div class="basis-[68%] items-center space-y-10 rounded-2xl bg-gray p-5 md:flex md:space-y-0 ">
                            <div class="basis-[63%]">
                                <h4 class="mb-5 text-xl font-medium text-primary">NEW ARRIVAL!</h4>
                                <h1 class="text-[50px] font-medium tracking-tight" style="line-height: 1em;">AIR JORDAN
                                    6 GX
                                    EASTSIDE</h1>
                                <p class="my-10 w-[80%] text-neutral-500">Feel unbeatable from the tee box to the final
                                    putt
                                    in
                                    a design that's pure early MJ: speed, class</p><button
                                    class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-5 py-4  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 ">View
                                    Product</button>
                            </div>
                            <div class="basis-[37%]"><img alt="shoe box" loading="lazy" width="1019" height="920"
                                    decoding="async" data-nimg="1" class="w-full" src="/images/shoe_box.png"
                                    style="color: transparent;">
                            </div>
                        </div>
                        <div class="mt-5 basis-[30%] lg:mt-0">
                            <div
                                class="relative h-full space-y-10 rounded-2xl bg-primary bg-[url(&quot;/bgPromo.png&quot;)] bg-cover bg-center bg-no-repeat p-5 text-white">
                                <h1 class="text-[40px] font-medium" style="line-height: 1em;">DISC UP TO 50% FOR
                                    SNEAKERS
                                    FEST
                                    ID 2023</h1>
                                <p class="w-[90%]">Join the sneaker fest 2023 on 23 October. We have more fun gigs too
                                    and
                                    supported by FootWear!.</p><button
                                    class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-5 py-4  bg-white text-primary">Event
                                    details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-32">
                    <div class="container">
                        <div class="overflow-hidden rounded-2xl bg-gray p-5">
                            <div class="mb-5 items-center justify-between space-y-5 md:flex md:space-y-0">
                                <h3 class="text-3xl font-medium">Top Best Deals!</h3>
                                <div class="inline-flex rounded-full bg-primary px-3 py-2 font-medium text-white">
                                    Ends in &nbsp;<span id="countdown" data-second="99999"></span></div>
                            </div>
                            <div class="pb-2">
                                <div class="">
                                    <div class="nc-Slider ">
                                        <div class="relative flow-root">
                                            <div class="swiper-home flow-root rounded-xl">
                                                <div class="swiper-button-prev p-5"></div>
                                                <ul class="swiper-wrapper relative -mx-2 flex whitespace-nowrap xl:-mx-4 ">
                                                    <li class="swiper-slide relative inline-block shrink-0 whitespace-normal px-2"
                                                        style="width: calc(25%); transform: translateX(0%) translateZ(0px);">
                                                        <div
                                                            class="transitionEffect relative rounded-2xl p-3 shadow-md bg-white">
                                                            <div
                                                                class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                                                <button type="button"
                                                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                                                        class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                                                        <path
                                                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg></button><a class="h-[250px] w-full lg:h-[220px]"
                                                                    href="https://hotkicks.themealchemy.com/products/brsb"><img
                                                                        alt="BRSB cover photo" loading="lazy" width="592"
                                                                        height="592" decoding="async" data-nimg="1"
                                                                        class="h-full w-full object-cover object-bottom"
                                                                        src="/images/brsb.jpg"
                                                                        style="color: transparent;"></a>
                                                            </div>
                                                            <div class="mt-3">
                                                                <div class="flex items-center justify-between">
                                                                    <h3 class="font-semibold">BRSB</h3>
                                                                    <p class="text-neutral-500 block text-sm line-through">
                                                                        $250
                                                                    </p>
                                                                </div>
                                                                <div class="flex items-center justify-between">
                                                                    <p class="text-sm text-neutral-500">Men's shoes</p>
                                                                    <p class="text-lg font-medium text-primary">$199
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="swiper-slide relative inline-block shrink-0 whitespace-normal px-2"
                                                        style="width: calc(25%); transform: translateX(0%) translateZ(0px);">
                                                        <div
                                                            class="transitionEffect relative rounded-2xl p-3 shadow-md bg-white">
                                                            <div
                                                                class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                                                <button type="button"
                                                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                                                        class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                                                        <path
                                                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                                            stroke="#e94e07" fill="#e94e07"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg></button><a class="h-[250px] w-full lg:h-[220px]"
                                                                    href="https://hotkicks.themealchemy.com/products/dunklow"><img
                                                                        alt="Dunk Low cover photo" loading="lazy"
                                                                        width="592" height="592" decoding="async"
                                                                        data-nimg="1"
                                                                        class="h-full w-full object-cover object-bottom"
                                                                        src="/images/dunklow.jpg"
                                                                        style="color: transparent;"></a>
                                                            </div>
                                                            <div class="mt-3">
                                                                <div class="flex items-center justify-between">
                                                                    <h3 class="font-semibold">Dunk Low</h3>
                                                                    <p class="text-neutral-500 block text-sm line-through">
                                                                        $250
                                                                    </p>
                                                                </div>
                                                                <div class="flex items-center justify-between">
                                                                    <p class="text-sm text-neutral-500">Men's shoes</p>
                                                                    <p class="text-lg font-medium text-primary">$199
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="swiper-slide relative inline-block shrink-0 whitespace-normal px-2"
                                                        style="width: calc(25%); transform: translateX(0%) translateZ(0px);">
                                                        <div
                                                            class="transitionEffect relative rounded-2xl p-3 shadow-md bg-white">
                                                            <div
                                                                class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                                                <button type="button"
                                                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                                                        class="h-5 w-5" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                                            stroke="#e94e07" fill="#e94e07"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg></button><a class="h-[250px] w-full lg:h-[220px]"
                                                                    href="https://hotkicks.themealchemy.com/products/lebronxx"><img
                                                                        alt="Lebron XXL cover photo" loading="lazy"
                                                                        width="592" height="592" decoding="async"
                                                                        data-nimg="1"
                                                                        class="h-full w-full object-cover object-bottom"
                                                                        src="/images/lebronxx.jpg"
                                                                        style="color: transparent;"></a>
                                                            </div>
                                                            <div class="mt-3">
                                                                <div class="flex items-center justify-between">
                                                                    <h3 class="font-semibold">Lebron XXL</h3>
                                                                    <p class="text-neutral-500 block text-sm line-through">
                                                                        $250
                                                                    </p>
                                                                </div>
                                                                <div class="flex items-center justify-between">
                                                                    <p class="text-sm text-neutral-500">Men's shoes</p>
                                                                    <p class="text-lg font-medium text-primary">$199
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="swiper-slide relative inline-block shrink-0 whitespace-normal px-2"
                                                        style="width: calc(25%); transform: translateX(0%) translateZ(0px);">
                                                        <div
                                                            class="transitionEffect relative rounded-2xl p-3 shadow-md bg-white">
                                                            <div
                                                                class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                                                <div
                                                                    class="absolute left-6 top-0 rounded-b-lg bg-primary px-3 py-2 text-sm uppercase text-white shadow-md">
                                                                    Just In!</div><button type="button"
                                                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                                                        class="h-5 w-5" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                                            stroke="#e94e07" fill="#e94e07"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg></button><a class="h-[250px] w-full lg:h-[220px]"
                                                                    href="https://hotkicks.themealchemy.com/products/metcon5"><img
                                                                        alt="Metcon 5 cover photo" loading="lazy"
                                                                        width="592" height="592" decoding="async"
                                                                        data-nimg="1"
                                                                        class="h-full w-full object-cover object-bottom"
                                                                        src="/images/metcon5.jpg"
                                                                        style="color: transparent;"></a>
                                                            </div>
                                                            <div class="mt-3">
                                                                <div class="flex items-center justify-between">
                                                                    <h3 class="font-semibold">Metcon 5</h3>
                                                                    <p class="text-neutral-500 block text-sm line-through">
                                                                        $250
                                                                    </p>
                                                                </div>
                                                                <div class="flex items-center justify-between">
                                                                    <p class="text-sm text-neutral-500">Men's shoes</p>
                                                                    <p class="text-lg font-medium text-primary">$199
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="swiper-slide relative inline-block shrink-0 whitespace-normal px-2"
                                                        style="width: calc(25%); transform: translateX(0%) translateZ(0px);">
                                                        <div
                                                            class="transitionEffect relative rounded-2xl p-3 shadow-md bg-white">
                                                            <div
                                                                class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                                                <button type="button"
                                                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                                                        class="h-5 w-5" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg></button><a class="h-[250px] w-full lg:h-[220px]"
                                                                    href="https://hotkicks.themealchemy.com/products/metcon9"><img
                                                                        alt="Metcon 9 cover photo" loading="lazy"
                                                                        width="592" height="592" decoding="async"
                                                                        data-nimg="1"
                                                                        class="h-full w-full object-cover object-bottom"
                                                                        src="/images/metcon9.jpg"
                                                                        style="color: transparent;"></a>
                                                            </div>
                                                            <div class="mt-3">
                                                                <div class="flex items-center justify-between">
                                                                    <h3 class="font-semibold">Metcon 9</h3>
                                                                    <p class="text-neutral-500 block text-sm line-through">
                                                                        $250
                                                                    </p>
                                                                </div>
                                                                <div class="flex items-center justify-between">
                                                                    <p class="text-sm text-neutral-500">Men's shoes</p>
                                                                    <p class="text-lg font-medium text-primary">$199
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="swiper-slide relative inline-block shrink-0 whitespace-normal px-2"
                                                        style="width: calc(25%); transform: translateX(0%) translateZ(0px);">
                                                        <div
                                                            class="transitionEffect relative rounded-2xl p-3 shadow-md bg-white">
                                                            <div
                                                                class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                                                <div
                                                                    class="absolute left-6 top-0 rounded-b-lg bg-primary px-3 py-2 text-sm uppercase text-white shadow-md">
                                                                    Just In!</div><button type="button"
                                                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                                                        class="h-5 w-5" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg></button><a class="h-[250px] w-full lg:h-[220px]"
                                                                    href="https://hotkicks.themealchemy.com/products/nike_blazer"><img
                                                                        alt="Nike Blazer cover photo" loading="lazy"
                                                                        width="592" height="592" decoding="async"
                                                                        data-nimg="1"
                                                                        class="h-full w-full object-cover object-bottom"
                                                                        src="/images/nike_blazer.jpg"
                                                                        style="color: transparent;"></a>
                                                            </div>
                                                            <div class="mt-3">
                                                                <div class="flex items-center justify-between">
                                                                    <h3 class="font-semibold">Nike Blazer</h3>
                                                                    <p class="text-neutral-500 block text-sm line-through">
                                                                        $250
                                                                    </p>
                                                                </div>
                                                                <div class="flex items-center justify-between">
                                                                    <p class="text-sm text-neutral-500">Men's shoes</p>
                                                                    <p class="text-lg font-medium text-primary">$199
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="swiper-button-next p-5"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-32">
                    <div class="container">
                        <div
                            class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-10">
                            <div class="mx-auto mb-2 w-full max-w-3xl text-center">
                                <h2 class="lineHeight text-3xl lg:text-[55px] mb-5 font-medium"
                                    style="line-height: 1.2em;">
                                    Chọn những món bạn thích :)))
                                </h2>
                                <p class="mt-5 text-neutral-500">
                                    Chúng tôi có rất nhiều bộ sưu tập dành cho bạn! Hãy cùng khám phá và tìm kiếm đôi giày
                                    mơ ước của bạn, biến nó thành hiện thực</p>
                            </div>
                        </div>
                        {{-- <div
                            class="mx-auto mb-10 max-w-4xl items-center justify-between space-y-3 rounded-2xl border border-neutral-300 p-2 md:flex md:space-y-0 md:rounded-full">
                            <div class="grid basis-[75%] gap-3 md:grid-cols-4"><select
                                    class="nc-Select h-12  block w-full rounded-full border-transparent bg-gray text-sm focus:border-transparent focus:ring focus:ring-transparent focus:ring-opacity-50">
                                    <option value="Nike">Nike</option>
                                    <option value="Alexander Mqueen">Alexander Mqueen</option>
                                    <option value="New Balance">New Balance</option>
                                    <option value="Compass">Compass</option>
                                </select><select
                                    class="nc-Select h-12  block w-full rounded-full border-transparent bg-gray text-sm focus:border-transparent focus:ring focus:ring-transparent focus:ring-opacity-50">
                                    <option value="Price">Price</option>
                                    <option value="Below $100">Below $100</option>
                                    <option value="Below $200">Below $200</option>
                                    <option value="Below $300">Below $300</option>
                                    <option value="Below $400">Below $400</option>
                                </select><select
                                    class="nc-Select h-12  block w-full rounded-full border-transparent bg-gray text-sm focus:border-transparent focus:ring focus:ring-transparent focus:ring-opacity-50">
                                    <option value="Size">Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXl">XXl</option>
                                </select><select
                                    class="nc-Select h-12  block w-full rounded-full border-transparent bg-gray text-sm focus:border-transparent focus:ring focus:ring-transparent focus:ring-opacity-50">
                                    <option value="Type">Type</option>
                                    <option value="Sandals">Sandals</option>
                                    <option value="Sneakers">Sneakers</option>
                                    <option value="Boots">Boots</option>
                                </select></div>
                            <div class="hidden h-5 w-px bg-neutral-300 md:block"></div><button
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  flex w-full items-center gap-1 bg-gray lg:w-auto">More
                                Filter<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                    stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                </svg></button>
                        </div> --}}
                        <div class="grid gap-7 md:grid-cols-2 lg:grid-cols-4">
                            @foreach ($products as $each)
                                <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
                                    <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                        <div
                                            class="absolute left-6 top-0 rounded-b-lg bg-primary px-3 py-2 text-sm uppercase text-white shadow-md">
                                            Quá đẽ
                                        </div>
                                        <button type="button" onclick="likeProduct('{{ $each['slug'] }}', this)"
                                            data-liked="{{ $each['liked'] }}"
                                            class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2 border-0">
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
                                        <a class="h-[250px] w-full lg:h-[220px]" href="/products/{{ $each->slug }}">
                                            <img alt="#" loading="lazy" width="592" height="592"
                                                decoding="async" data-nimg="1"
                                                class="h-full w-full object-cover object-bottom"
                                                src="/images/new_balance3.webp" style="color: transparent;">
                                        </a>
                                    </div>
                                    <div class="mt-3">
                                        <div class="flex items-center justify-between">
                                            <h3 class="font-semibold">{{ $each->name }}</h3>
                                            <p class="text-neutral-500 text-sm line-through">{{ $each->price }} Đ</p>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm text-neutral-500">{{ $each->category_name }}</p>
                                            <p class="text-lg font-medium text-primary">{{ $each->price_sale }} Đ</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-14 flex items-center justify-center">
                            <a href="/products">
                                <button
                                    class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 ">
                                    Xem thêm
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mb-32">
                    <div class="container">
                        <div
                            class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-10">
                            <div class="mx-auto mb-2 w-full max-w-3xl text-center">
                                <h2 class="lineHeight text-3xl lg:text-[55px] mb-5 font-medium"
                                    style="line-height: 1.2em;">
                                    Các thể loại bán chạy nhất
                                </h2>
                                <p class="mt-5 text-neutral-500">
                                    Chúng tôi hợp tác với các thương hiệu chất lượng cao và nổi tiếng trên toàn thế giới</p>
                            </div>
                        </div>
                        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($categories as $category)
                                <div class="rounded-2xl border border-neutral-300 p-3">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <div class="h-20 w-20 overflow-hidden rounded-lg"><img alt="logo"
                                                    loading="lazy" width="130" height="130" decoding="async"
                                                    data-nimg="1" class="h-full w-full object-cover object-center"
                                                    src="/images/compass_profile.jpeg" style="color: transparent;"></div>
                                            <div>
                                                <h3 class="flex items-center gap-1 text-sm font-medium">
                                                    {{ $category->name }}
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                        viewBox="0 0 256 256" class="text-blue-600" height="1em"
                                                        width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z">
                                                        </path>
                                                    </svg>
                                                </h3>
                                                <p class="text-sm text-neutral-500">
                                                    {{ substr($category->description, 0, 20) }}...
                                            </div>
                                        </div><a
                                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  border-2 border-primary text-primary"
                                            href="#">Visit</a>
                                    </div>
                                    <div class="mt-3 grid grid-cols-2 gap-3">
                                        <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe"
                                                loading="lazy" width="1299" height="1299" decoding="async"
                                                data-nimg="1" class="h-full w-full object-cover object-bottom"
                                                src="/images/compass1.jpg" style="color: transparent;"></div>
                                        <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe"
                                                loading="lazy" width="738" height="738" decoding="async"
                                                data-nimg="1" class="h-full w-full object-cover object-bottom"
                                                src="/images/compass2.jpg" style="color: transparent;"></div>
                                        <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe"
                                                loading="lazy" width="1477" height="1477" decoding="async"
                                                data-nimg="1" class="h-full w-full object-cover object-bottom"
                                                src="/images/compass3.png" style="color: transparent;"></div>
                                        <div class="h-[150px] overflow-hidden rounded-lg bg-gray"><img alt="shoe"
                                                loading="lazy" width="4480" height="4480" decoding="async"
                                                data-nimg="1" class="h-full w-full object-cover object-bottom"
                                                src="/images/compass4.jpg" style="color: transparent;"></div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="mt-14 flex items-center justify-center"><button
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 ">Xem
                                thêm</button></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="container mb-10">
                    <div class="rounded-2xl bg-cover bg-center bg-no-repeat py-16 text-white"
                        style="background-image: url('{{ asset('images/bgProducts.jpg') }}')">
                        <div
                            class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-0">
                            <div class="mx-auto mb-2 w-full max-w-3xl text-center">
                                <h2 style="line-height:1.2em" class="lineHeight text-3xl lg:text-[55px] mb-5 font-medium">
                                    BRINGING YOU TO UPDATE WITH FANTASTIC FOOTWEAR</h2>
                            </div>
                        </div>
                        <p class="mx-auto w-[80%] text-center md:w-[50%]">View all brands of our collection on
                            HotKicks,
                            there
                            is another collection. Please check it out bro, like seriously</p>
                        <div class="mt-10 flex items-center justify-center"><button
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-6 py-4  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 ">More
                                about us</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
    @if (session('verify-email'))
        <script>
            openModal("Xác nhận email", "Vui lòng kiểm tra email của bạn để xác nhận tài khoản", "Xác nhận", "Đóng", 0);
        </script>
    @endif
@endpush