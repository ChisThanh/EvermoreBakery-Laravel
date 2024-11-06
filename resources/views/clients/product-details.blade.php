@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="my-10 flex items-center justify-between">
            <a href="/">
                <button type="button"
                    class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 border border-neutral-300 w-10 h-10 ">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-2xl"
                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
                    </svg>
                </button>
            </a>
            <div class="flex items-center gap-4">
                <button type="button" class="text-neutral-500">Home</button><button type="button"
                    class="text-neutral-500">Banner</button><button type="button" class="text-primary">New
                    Arrival</button>
            </div>
        </div>
        <div class="mb-20">
            <div class="items-stretch justify-between space-y-10 lg:flex lg:space-y-0">
                <div class="basis-[50%]">
                    <div class="space-y-3 rounded-2xl border border-neutral-300 p-2">
                        <div class="relative overflow-hidden rounded-2xl md:h-[520px]">
                            <button type="button" onclick="likeProduct('{{ $data->slug }}', this)"
                                data-liked="{{ $data->liked }}"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-5 top-5">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    @if ($data->liked)
                                        <path
                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                            stroke="currentColor" fill="#e94e07" stroke-width="0" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    @else
                                        <path
                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                            stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    @endif
                                </svg>
                            </button>
                            <img alt="shoe image" loading="lazy" width="592" height="592" decoding="async"
                                data-nimg="1" class="h-full w-full object-cover object-center"
                                src="{{ asset('images/new_balance3.webp') }}" style="color: transparent;">
                        </div>
                        <div class="grid grid-cols-4 gap-3">
                            <div class="border-2 border-primary h-[100px] overflow-hidden rounded-lg"><button
                                    class="h-full w-full" type="button"><img alt="shoe image" loading="lazy" width="592"
                                        height="592" decoding="async" data-nimg="1"
                                        class="h-full w-full object-cover object-center"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrsb.fabc76b3.webp&amp;w=1200&amp;q=75"
                                        style="color: transparent;"></button></div>
                            <div class=" h-[100px] overflow-hidden rounded-lg"><button class="h-full w-full"
                                    type="button"><img alt="shoe image" loading="lazy" width="1728" height="2160"
                                        decoding="async" data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fshot1.14f0adaf.webp&amp;w=3840&amp;q=75"
                                        style="color: transparent;"></button></div>
                            <div class=" h-[100px] overflow-hidden rounded-lg"><button class="h-full w-full"
                                    type="button"><img alt="shoe image" loading="lazy" width="1728" height="2160"
                                        decoding="async" data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fshot2.ed54f1a5.webp&amp;w=3840&amp;q=75"
                                        style="color: transparent;"></button></div>
                            <div class=" h-[100px] overflow-hidden rounded-lg"><button class="h-full w-full"
                                    type="button"><img alt="shoe image" loading="lazy" width="1728" height="2160"
                                        decoding="async" data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fshot3.60c76c79.jpeg&amp;w=3840&amp;q=75"
                                        style="color: transparent;"></button></div>
                            <div class=" h-[100px] overflow-hidden rounded-lg"><button class="h-full w-full"
                                    type="button"><img alt="shoe image" loading="lazy" width="1728" height="2160"
                                        decoding="async" data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fshot4.e5153fdb.jpeg&amp;w=3840&amp;q=75"
                                        style="color: transparent;"></button></div>
                            <div class=" h-[100px] overflow-hidden rounded-lg"><button class="h-full w-full"
                                    type="button"><img alt="shoe image" loading="lazy" width="1728" height="2160"
                                        decoding="async" data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fshot5.43b0df15.webp&amp;w=3840&amp;q=75"
                                        style="color: transparent;"></button></div>
                            <div class=" h-[100px] overflow-hidden rounded-lg"><button class="h-full w-full"
                                    type="button"><img alt="shoe image" loading="lazy" width="1728" height="2160"
                                        decoding="async" data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fshot6.ff9188af.jpeg&amp;w=3840&amp;q=75"
                                        style="color: transparent;"></button></div>
                            <div class=" h-[100px] overflow-hidden rounded-lg"><button class="h-full w-full"
                                    type="button"><img alt="shoe image" loading="lazy" width="1728" height="2160"
                                        decoding="async" data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fshot7.388b33c1.webp&amp;w=3840&amp;q=75"
                                        style="color: transparent;"></button></div>
                        </div>
                    </div>
                </div>
                <div class="basis-[45%]">
                    <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-0">
                        <div class="max-w-4xl">
                            <p class="text-2xl font-medium uppercase text-primary">new arrival!</p>
                            <h2 class="lineHeight text-3xl lg:text-[55px] mb-5 font-medium" style="line-height: 1.2em;">
                                {{ $data->name }}
                            </h2>
                        </div>
                    </div>
                    <div class="mb-10 flex items-center">
                        <div class="flex items-center gap-1"><button type="button"
                                class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 overflow-hidden border border-neutral-400 w-11 h-11 ">
                                <img alt="nike_profile" loading="lazy" width="200" height="200" decoding="async"
                                    data-nimg="1" class="h-full w-full object-cover"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnike_profile.34f18203.jpg&amp;w=640&amp;q=75"
                                    style="color: transparent;">
                            </button><span class="font-medium">{{ $data->category->name }}</span>
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256"
                                class="text-blue-600" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z">
                                </path>
                            </svg>
                        </div><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            class="mx-3 text-neutral-500" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 18a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z"></path>
                        </svg>
                        <div class="flex items-center gap-1">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                class="text-yellow-400" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                </path>
                            </svg>
                            <p class="text-sm">4.8 <span class="text-neutral-500">(56 Reviews)</span></p>
                        </div>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            class="mx-3 text-neutral-500" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 18a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z"></path>
                        </svg>
                        <p class="text-neutral-500">600 items sold</p>
                    </div>
                    <div class="mb-5 space-y-1">
                        <p class="text-neutral-500 line-through">{{ $data->price }} VNĐ</p>
                        <h1 class="text-3xl font-medium">{{ $data->price_sale }} VNĐ</h1>
                    </div>
                    <div class="mb-5 flex items-end justify-between">
                        <p class="text-xl">Available sizes</p>
                        <p class="flex items-center gap-1 text-sm text-neutral-500">Size guide <svg stroke="currentColor"
                                fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                stroke-linejoin="round" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 16v-4"></path>
                                <path d="M12 8h.01"></path>
                            </svg></p>
                    </div>
                    <div class="grid grid-cols-3 gap-3"><button type="button"
                            class="relative w-full rounded-xl py-10 font-medium disabled:bg-gray disabled:text-neutral-500 bg-gray text-black"
                            disabled=""><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                viewBox="0 0 512 512" class="absolute right-2 top-2 text-white hidden" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>EU36</button><button type="button"
                            class="relative w-full rounded-xl py-10 font-medium disabled:bg-gray disabled:text-neutral-500 bg-gray text-black"
                            disabled=""><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                viewBox="0 0 512 512" class="absolute right-2 top-2 text-white hidden" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>EU37</button><button type="button"
                            class="relative w-full rounded-xl py-10 font-medium disabled:bg-gray disabled:text-neutral-500 bg-gray text-black"><svg
                                stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                class="absolute right-2 top-2 text-white hidden" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>EU38</button><button type="button"
                            class="relative w-full rounded-xl py-10 font-medium disabled:bg-gray disabled:text-neutral-500 bg-gray text-black"
                            disabled=""><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                viewBox="0 0 512 512" class="absolute right-2 top-2 text-white hidden" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>EU39</button><button type="button"
                            class="relative w-full rounded-xl py-10 font-medium disabled:bg-gray disabled:text-neutral-500 bg-gray text-black"
                            disabled=""><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                viewBox="0 0 512 512" class="absolute right-2 top-2 text-white hidden" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>EU40</button><button type="button"
                            class="relative w-full rounded-xl py-10 font-medium disabled:bg-gray disabled:text-neutral-500 bg-gray text-black"><svg
                                stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                class="absolute right-2 top-2 text-white hidden" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>EU41</button><button type="button"
                            class="relative w-full rounded-xl py-10 font-medium disabled:bg-gray disabled:text-neutral-500 bg-gray text-black"
                            disabled=""><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                viewBox="0 0 512 512" class="absolute right-2 top-2 text-white hidden" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>EU42</button><button type="button"
                            class="relative w-full rounded-xl py-10 font-medium disabled:bg-gray disabled:text-neutral-500 bg-gray text-black"
                            disabled=""><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                viewBox="0 0 512 512" class="absolute right-2 top-2 text-white hidden" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>EU43</button><button type="button"
                            class="relative w-full rounded-xl py-10 font-medium disabled:bg-gray disabled:text-neutral-500 bg-gray text-black"
                            disabled=""><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                viewBox="0 0 512 512" class="absolute right-2 top-2 text-white hidden" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>EU44</button>
                    </div>
                    <div class="mt-5 flex items-center gap-5">
                        <button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 w-full">Buy
                            Now
                        </button>
                        <button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  flex w-full items-center gap-1 border-2 border-primary text-primary"
                            onclick="window.location.href='/products/add-to-cart/{{ $data->slug }}'">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z">
                                </path>
                            </svg>
                            Add to cart
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <div class="mb-28">
            <div class="grid gap-16 lg:grid-cols-2">
                <div>
                    <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-0">
                        <div class="max-w-4xl">
                            <h2 class="text-3xl mb-5 font-medium" style="line-height: 1.2em;">Product Info</h2>
                        </div>
                    </div>
                    <div class="mb-10 flex items-center gap-5"><button type="button"
                            class="py-4 text-neutral-500">Overview</button><button type="button"
                            class="py-4 border-b-2 border-primary">Shipment details</button></div>
                    <div class="mb-10 hidden">
                        <div class="grid gap-5 md:grid-cols-2">
                            <div class="flex items-center gap-2"><button type="button"
                                    class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray w-12 h-12 "><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256"
                                        class="text-xl text-secondary" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M176,172a12,12,0,1,1-12-12A12,12,0,0,1,176,172ZM92,96A12,12,0,1,0,80,84,12,12,0,0,0,92,96ZM224,48V208a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM64,84A28,28,0,1,0,92,56,28,28,0,0,0,64,84Zm128,88a28,28,0,1,0-28,28A28,28,0,0,0,192,172ZM189.66,66.34a8,8,0,0,0-11.32,0l-112,112a8,8,0,0,0,11.32,11.32l112-112A8,8,0,0,0,189.66,66.34Z">
                                        </path>
                                    </svg></button>
                                <div>
                                    <p class="text-sm text-neutral-500">Discount</p>
                                    <p>&gt; $100 Disc 10%</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2"><button type="button"
                                    class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray w-12 h-12 "><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                                        class="text-xl text-secondary" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                                        </path>
                                    </svg></button>
                                <div>
                                    <p class="text-sm text-neutral-500">Delivery Time</p>
                                    <p>6 - 12 Working days</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2"><button type="button"
                                    class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray w-12 h-12 "><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                        class="text-xl text-secondary" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z">
                                        </path>
                                    </svg></button>
                                <div>
                                    <p class="text-sm text-neutral-500">Package</p>
                                    <p>Reagular Premium Box</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2"><button type="button"
                                    class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray w-12 h-12 "><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512"
                                        class="text-xl text-secondary" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z">
                                        </path>
                                    </svg></button>
                                <div>
                                    <p class="text-sm text-neutral-500">Estimated Arrival</p>
                                    <p>10 - 12 October 23</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-10 block">
                        <div class="grid gap-5 md:grid-cols-2">
                            <div class="flex items-center gap-2"><button type="button"
                                    class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray w-12 h-12 "><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256"
                                        class="text-xl text-secondary" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M176,172a12,12,0,1,1-12-12A12,12,0,0,1,176,172ZM92,96A12,12,0,1,0,80,84,12,12,0,0,0,92,96ZM224,48V208a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM64,84A28,28,0,1,0,92,56,28,28,0,0,0,64,84Zm128,88a28,28,0,1,0-28,28A28,28,0,0,0,192,172ZM189.66,66.34a8,8,0,0,0-11.32,0l-112,112a8,8,0,0,0,11.32,11.32l112-112A8,8,0,0,0,189.66,66.34Z">
                                        </path>
                                    </svg></button>
                                <div>
                                    <p class="text-sm text-neutral-500">Discount</p>
                                    <p>&gt; $100 Disc 10%</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2"><button type="button"
                                    class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray w-12 h-12 "><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                                        class="text-xl text-secondary" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                                        </path>
                                    </svg></button>
                                <div>
                                    <p class="text-sm text-neutral-500">Delivery Time</p>
                                    <p>6 - 12 Working days</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2"><button type="button"
                                    class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray w-12 h-12 "><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                        class="text-xl text-secondary" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z">
                                        </path>
                                    </svg></button>
                                <div>
                                    <p class="text-sm text-neutral-500">Package</p>
                                    <p>Reagular Premium Box</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2"><button type="button"
                                    class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray w-12 h-12 "><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512"
                                        class="text-xl text-secondary" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z">
                                        </path>
                                    </svg></button>
                                <div>
                                    <p class="text-sm text-neutral-500">Estimated Arrival</p>
                                    <p>10 - 12 October 23</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-medium">Note*</h3>
                        <p class="text-neutral-500"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae, est
                            eum magnam doloremque, at adipisci debitis, similique dolores ipsa unde necessitatibus vero
                            quibusdam nostrum numquam!</p>
                    </div>
                </div>
                <div>
                    <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-0">
                        <div class="max-w-4xl">
                            <h2 class="text-3xl mb-5 font-medium" style="line-height: 1.2em;">Ratings</h2>
                        </div>
                    </div>
                    <div class="flex items-center gap-5">
                        <div class="space-y-3">
                            <p class="text-[70px] font-semibold md:text-[100px]">4.8<span
                                    class="text-base text-secondary">/5</span></p>
                            <p class="text-neutral-500">(56 Reviews)</p>
                        </div>
                        <div class="w-full space-y-2">
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-1 font-medium"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-yellow-400"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                        </path>
                                    </svg>5</div>
                                <div class="relative flex h-2 w-full overflow-hidden rounded-full bg-gray">
                                    <div class="flex h-full bg-primary" style="width: 100%;"></div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-1 font-medium"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-yellow-400"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                        </path>
                                    </svg>4</div>
                                <div class="relative flex h-2 w-full overflow-hidden rounded-full bg-gray">
                                    <div class="flex h-full bg-primary" style="width: 56%;"></div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-1 font-medium"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-yellow-400"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                        </path>
                                    </svg>3</div>
                                <div class="relative flex h-2 w-full overflow-hidden rounded-full bg-gray">
                                    <div class="flex h-full bg-primary" style="width: 22%;"></div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-1 font-medium"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-yellow-400"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                        </path>
                                    </svg>2</div>
                                <div class="relative flex h-2 w-full overflow-hidden rounded-full bg-gray">
                                    <div class="flex h-full bg-primary" style="width: 14%;"></div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-1 font-medium"><svg stroke="currentColor"
                                        fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-yellow-400"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path
                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                        </path>
                                    </svg>1</div>
                                <div class="relative flex h-2 w-full overflow-hidden rounded-full bg-gray">
                                    <div class="flex h-full bg-primary" style="width: 2%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-28">
            <div>
                <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-0">
                    <div class="max-w-4xl">
                        <h2 class="text-3xl mb-5 font-medium" style="line-height: 1.2em;">Explore more products</h2>
                    </div>
                </div>
                <div class="grid gap-7 md:grid-cols-2 lg:grid-cols-4">
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
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
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fdunklow.18061fa7.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Dunk Low</h3>
                                <p class="text-neutral-500 hidden text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/lebronxx"><img
                                    alt="Lebron XXL cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flebronxx.f8f8ed59.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Lebron XXL</h3>
                                <p class="text-neutral-500 hidden text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
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
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fmetcon5.104ecaa9.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Metcon 5</h3>
                                <p class="text-neutral-500 hidden text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/metcon9"><img
                                    alt="Metcon 9 cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fmetcon9.954f2f42.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Metcon 9</h3>
                                <p class="text-neutral-500 hidden text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
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
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/nike_blazer"><img
                                    alt="Nike Blazer cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fnike_blazer.1e1b15e6.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Nike Blazer</h3>
                                <p class="text-neutral-500 hidden text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
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
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fredlow.d8dfddcd.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Dunk Low Red</h3>
                                <p class="text-neutral-500 hidden text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]"><button
                                type="button"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2"><svg
                                    class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                        stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg></button><a class="h-[250px] w-full lg:h-[220px]" href="/products/slides"><img
                                    alt="Slides cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fslides.413749d0.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a></div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Slides</h3>
                                <p class="text-neutral-500 hidden text-sm line-through">$250</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">Men's shoes</p>
                                <p class="text-lg font-medium text-primary">$199</p>
                            </div>
                        </div>
                    </div>
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
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
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FyellowLow.cc64548d.webp&amp;w=1200&amp;q=75"
                                    style="color: transparent;"></a>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">Dunk Low Yellow</h3>
                                <p class="text-neutral-500 hidden text-sm line-through">$250</p>
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
    </div>
@endsection
@push('scripts')
    <script>
        @if (session('success'))
            openToast('success', '{{ session('success') }}', 5000);
        @endif
    </script>
@endpush
