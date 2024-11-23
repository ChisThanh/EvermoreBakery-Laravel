@extends('layouts.main')
@section('content')
    @php
        $images = $data->images;
    @endphp
    <div class="my-8 flex flex-col items-center space-y-20 text-primary">
        <div class="container items-stretch justify-between space-y-10 lg:flex lg:space-y-0 row">
            <div class="basis-[50%]">
                <div class="space-y-3 rounded-2xl border border-neutral-300 p-4">
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
                        <img alt="shoe image" loading="lazy" width="592" height="592" decoding="async" data-nimg="1"
                            class="h-full w-full object-cover object-center" src="/storage/{{ $images[0]->url }}"
                            style="color: transparent;">
                    </div>
                    <div class="grid lg:grid-cols-4 grid-cols-2 gap-3">
                        @for ($i = 1; $i < sizeof($images); $i++)
                            <div class="border-2 border-primary h-[100px] overflow-hidden rounded-lg">
                                <button class="h-full w-full" type="button">
                                    <img alt="shoe image" loading="lazy" width="592" height="592" decoding="async"
                                        data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="/storage/{{ $images[$i]->url }}" style="color: transparent;">
                                </button>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="basis-[45%] space-y-8">
                <div class="flex flex-col justify-between sm:flex-row sm:items-end mb-0">
                    <div class="max-w-4xl">
                        <div class="text-3xl lg:text-[55px] font-bold">{{ $data->name }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-1">
                    <button type="button"
                        class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 overflow-hidden border border-neutral-400 w-11 h-11">
                        <img alt="nike_profile" loading="lazy" width="200" height="200" decoding="async" data-nimg="1"
                            class="h-full w-full object-cover"
                            src="/storage/{{ $data->category->images->first()->url ?? '' }}">
                    </button>
                    <span class="font-medium">{{ $data->category->name }}</span>
                </div>
                <div class="space-y-1">
                    <p class="text-neutral-500 line-through">{{ $data->price }} VNĐ</p>
                    <h1 class="text-3xl font-medium">{{ $data->price_sale }} VNĐ</h1>
                </div>
                <div class="space-y-2">
                    <div class="flex flex-row items-center justify-start text-sm font-medium text-center space-x-4">
                        <button id="tab-info"
                            class="flex items-center justify-center p-4 border-b-2 border-primary rounded-t-lg group hover:border-primary">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 fill-primary group-hover:fill-primary">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M10 10C10 10.5523 10.4477 11 11 11V17C10.4477 17 10 17.4477 10 18C10 18.5523 10.4477 19 11 19H13C13.5523 19 14 18.5523 14 18C14 17.4477 13.5523 17 13 17V9H11C10.4477 9 10 9.44772 10 10Z">
                                    </path>
                                    <path
                                        d="M12 8C12.8284 8 13.5 7.32843 13.5 6.5C13.5 5.67157 12.8284 5 12 5C11.1716 5 10.5 5.67157 10.5 6.5C10.5 7.32843 11.1716 8 12 8Z">
                                    </path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M23 4C23 2.34315 21.6569 1 20 1H4C2.34315 1 1 2.34315 1 4V20C1 21.6569 2.34315 23 4 23H20C21.6569 23 23 21.6569 23 20V4ZM21 4C21 3.44772 20.5523 3 20 3H4C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4Z">
                                    </path>
                                </g>
                            </svg>
                            <div class="ml-2 text-primary group-hover:text-primary">
                                Thông tin
                            </div>
                        </button>
                        <button id="tab-nutrition"
                            class="flex items-center justify-center p-4 border-primary rounded-t-lg group hover:border-b-2">
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 fill-primary group-hover:fill-primary" aria-hidden="true">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>ionicons-v5-m</title>
                                    <path
                                        d="M352,128c-32.26-2.89-64,16-96,16s-63.75-19-96-16c-64,6-96,64-96,160,0,80,64,192,111.2,192s51.94-24,80.8-24,33.59,24,80.8,24S448,368,448,288C448,192,419,134,352,128Z"
                                        style="fill:none;stroke:#451c0d;stroke-miterlimit:10;stroke-width:32px"></path>
                                    <path
                                        d="M323.92,83.14c-21,21-45.66,27-58.82,28.79A8,8,0,0,1,256,103.2a97.6,97.6,0,0,1,28.61-59.33c22-22,46-26.9,58.72-27.85A8,8,0,0,1,352,24.94,98,98,0,0,1,323.92,83.14Z">
                                    </path>
                                    <ellipse cx="216" cy="304" rx="24" ry="48"></ellipse>
                                    <ellipse cx="296" cy="304" rx="24" ry="48"></ellipse>
                                </g>
                            </svg>
                            <div class="ml-2 text-primary group-hover:text-primary">
                                Dinh Dưỡng
                            </div>
                        </button>
                        <button id="tab-ingredient"
                            class="flex items-center justify-center p-4 border-primary rounded-t-lg group hover:border-b-2 ">
                            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 fill-primary group-hover:fill-primary">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M4.70711 12.7071L8 16L11.2929 12.7071L8 9.41421L4.70711 12.7071Z"></path>
                                    <path d="M3.29289 11.2929L6.58579 8L3.29289 4.70711L0 8L3.29289 11.2929Z"></path>
                                    <path d="M4.70711 3.29289L8 0L11.2929 3.29289L8 6.58579L4.70711 3.29289Z"></path>
                                    <path d="M12.7071 4.70711L9.41421 8L12.7071 11.2929L16 8L12.7071 4.70711Z"></path>
                                </g>
                            </svg>
                            <div class="ml-2 text-primary group-hover:text-primary">
                                Thành Phần
                            </div>
                        </button>
                    </div>
                    <div class="p-2">
                        <div id="content-info" class="w-full">
                            {{ $data->description }}
                        </div>
                        <div id="content-nutrition" class="w-full hidden">
                            @foreach ($data->nutrition as $each)
                                <div class="grid grid-flow-col gap-4">
                                    <div class="col">{{ $each->name }}</div>
                                    <div class="col">{{ "{$each->pivot->quantity} {$each->unit}" }} </div>
                                </div>
                            @endforeach

                        </div>
                        <div id="content-ingredient" class="w-full hidden">
                            <div class="grid grid-flow-col gap-4">
                                @foreach ($data->ingredients as $each)
                                    <div class="col">{{ $each->name }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-5">
                    <button onclick="window.location.href='/products/buy-now/{{ $data->slug }}'"
                        class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 w-full">
                        Mua Ngay </button>
                    <button
                        class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  flex w-full items-center gap-1 border-2 border-primary text-primary"
                        onclick="window.location.href='/products/add-to-cart/{{ $data->slug }}'">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z">
                            </path>
                        </svg>
                        Thêm Giỏ Hàng
                    </button>
                </div>
            </div>
        </div>
        @if (auth()->check() && $data->review)
            <div class="container flex flex-col items-center justify-center space-y-8">
                <div class="text-center w-full lg:px-4">
                    <div class="text-[40px] font-bold">BẠN NGHĨ GÌ VỀ SẢN PHẨM NÀY</div>
                    <div class="text-xl font-normal mt-2">
                        Evermorebakery luôn luôn quan tâm và tôn trọng ý kiến của bạn
                    </div>
                </div>
                <form method="POST" action="/products/review/{{ $data->slug }}"
                    class="flex lg:flex-row flex-col items-center justify-center space-x-4 w-full">
                    @csrf
                    <input type="text" 
                        class="w-1/2 border-2 border-primary rounded-xl focus:border-tertiary focus:outline-none focus:ring-1 focus:ring-tertiary"
                        placeholder="Nhập bình luận của bạn" name="review">
                    <button type="submit" class="rounded-xl p-3 bg-primary text-secondary hover:bg-tertiary">
                        Bình Luận
                    </button>
                </form>
            </div>
        @endif
        <div class="container flex flex-col items-center justify-center space-y-8">
            <div class="text-center w-full lg:px-4">
                <div class="text-[40px] font-bold">CÓ THỂ BẠN CŨNG SẼ THÍCH</div>
                <div class="text-xl font-normal mt-2">
                    Thèm bánh ưu, đừng ngại ngùng mà để Evermore Bakery lo!
                </div>
            </div>
            <div class="grid gap-7 md:grid-cols-2 lg:grid-cols-4">
                @for ($i = 1; $i < 5; $i++)
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                            <a class="h-[250px] w-full lg:h-[220px]"
                                href="/products/{{ $productRecommend[$i]['slug'] }}">
                                <img alt="Dunk Low cover photo" loading="lazy" width="592" height="592"
                                    decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    src="/storage/{{ $productRecommend[$i]['image_url'] }}" style="color: transparent;">
                            </a>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">{{ $productRecommend[$i]['name'] }}</h3>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">{{ $productRecommend[$i]['category_name'] }}</p>
                                <p class="text-lg font-medium text-primary">{{ $productRecommend[$i]['price_sale'] }} Đ
                                </p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="flex items-center justify-center">
                <button onclick="window.location.href='/products'"
                    class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 ">Xem
                    Thêm</button>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabInfo = document.querySelector('#tab-info');
            const contentInfo = document.querySelector('#content-info');
            const tabNutrition = document.querySelector('#tab-nutrition');
            const contentNutrition = document.querySelector('#content-nutrition');
            const tabIngredient = document.querySelector('#tab-ingredient');
            const contentIngredient = document.querySelector('#content-ingredient');

            tabInfo.addEventListener('click', () => {
                tabInfo.classList.add('border-b-2');
                tabNutrition.classList.remove('border-b-2');
                tabIngredient.classList.remove('border-b-2');

                contentInfo.classList.remove('hidden');
                contentNutrition.classList.add('hidden');
                contentIngredient.classList.add('hidden');
            });
            tabNutrition.addEventListener('click', () => {
                tabInfo.classList.remove('border-b-2');
                tabNutrition.classList.add('border-b-2');
                tabIngredient.classList.remove('border-b-2');

                contentInfo.classList.add('hidden');
                contentNutrition.classList.remove('hidden');
                contentIngredient.classList.add('hidden');
            });
            tabIngredient.addEventListener('click', () => {
                tabInfo.classList.remove('border-b-2');
                tabNutrition.classList.remove('border-b-2');
                tabIngredient.classList.add('border-b-2');

                contentInfo.classList.add('hidden');
                contentNutrition.classList.add('hidden');
                contentIngredient.classList.remove('hidden');
            });
        });
    </script>
@endpush
