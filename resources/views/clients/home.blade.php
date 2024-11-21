@extends('layouts.main')
@section('content')
    <div class="my-8 flex flex-col items-center space-y-20 text-primary">
        <a href="#" id="event-banner" class="container lg:my-8">
            <img src="/images/static/default_banner.png" alt="Default Banner" class="w-full h-auto" id="banner-image">
        </a>
        <div class="container flex flex-col items-center justify-center space-y-8">
            <div class="text-left w-full lg:px-4">
                <div class="text-[40px] font-bold">VỪA NGON VỪA RẺ</div>
                <div class="text-xl font-normal mt-2">
                    Chung tay thưởng thức những chiếc bánh hảo hạn của Evermore Bakery với giá cả siêu hời
                </div>
            </div>
            <div class="grid gap-7 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($products as $each)
                    <div class="transitionEffect relative rounded-2xl p-3 shadow-md border-neutral-300 bg-secondary">
                        <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                            <div
                                class="absolute left-6 top-0 rounded-b-lg bg-primary px-3 py-2 text-sm uppercase text-white shadow-md">
                                Siêu hấp dẫn
                            </div>
                            <button type="button" onclick="likeProduct('{{ $each['slug'] ?? '' }}', this)"
                                data-liked="{{ $each['liked'] }}"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2 border-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                    @if ($each['liked'])
                                        <path
                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                            stroke="currentColor" fill="#e94e07" stroke-width="0" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    @else
                                        <path
                                            d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                            stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    @endif
                                </svg>
                            </button>
                            <a class="h-[250px] w-full lg:h-[220px]" href="/products/{{ $each->slug }}">
                                <img alt="#" loading="lazy" width="592" height="592" decoding="async"
                                    data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    src="/storage/{{ $each->image }}" style="color: transparent;">
                            </a>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold">{{ $each->name }}</h3>
                                <p class="text-neutral-500 text-sm line-through">@if($each->price != $each->price_sale) {{ $each->price }} Đ @endif</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-neutral-500">{{ $each->category_name }}</p>
                                <p class="text-lg font-medium text-primary">{{ $each->price_sale }} Đ</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center justify-center">
                <button
                    onclick="window.location.href = '/products';"
                    class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 ">Xem
                    Thêm</button>
            </div>
        </div>
        <div class="container flex flex-col items-center justify-center space-y-8">
            <div class="text-center">
                <div class="text-[40px] font-bold">BÁNH MỚI</div>
                <div class="text-xl font-normal mt-2">
                    Thưởng thức những chiếc bánh thơm ngon và bổ dưỡng nhất thế giới ngay tại Evermore Bakery
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <a href="#" class="relative group overflow-hidden">
                    <img src="/images/static/tiramisu.png" alt="Cinnamon Tiramisu"
                        class="rounded-2xl w-full h-full object-cover">
                    <div
                        class="absolute bottom-0 left-0 rounded-b-2xl w-full bg-primary text-secondary text-xl font-semibold py-2 px-6 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                        Tiramisu Cinamon
                    </div>
                </a>
                <a href="#" class="relative group overflow-hidden">
                    <img src="/images/static/cheesecake.png" alt="Berry Cheesecake"
                        class="rounded-2xl w-full h-full object-cover">
                    <div
                        class="absolute bottom-0 left-0 rounded-b-2xl w-full bg-primary text-secondary text-xl font-semibold py-2 px-6 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                        Cheesecake Berry
                    </div>
                </a>
                <a href="#" class="relative group overflow-hidden">
                    <img src="/images/static/mousse.png" alt="Raspberry Mousse"
                        class="rounded-2xl w-full h-full object-cover">
                    <div
                        class="absolute bottom-0 left-0 rounded-b-2xl w-full bg-primary text-secondary text-xl font-semibold py-2 px-6 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                        Mousse Raspberry
                    </div>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="overflow-hidden rounded-2xl bg-secondary p-5">
                <div class="mb-5 items-center justify-between space-y-5 md:flex md:space-y-0">
                    <div>
                        <div class="text-[40px] font-bold">Hôm Nay Bạn Nên Thưởng Thức</div>
                        <div class="text-xl font-normal mt-2">
                            Được tuyển chọn dựa theo sở thích của bạn. Bon appetit!
                        </div>
                    </div>
                    <div class="inline-flex rounded-full bg-primary px-3 py-2 font-medium text-white">
                        Kết Thúc Trong &nbsp;
                        <span id="countdown" data-second="99999"></span>
                    </div>
                </div>
                <div class="pb-2">
                    <div class="">
                        <div class="nc-Slider ">
                            <div class="relative flow-root">
                                <div class="swiper-home flow-root rounded-xl">
                                    <div class="swiper-button-prev p-5"></div>
                                    <ul id="recommend-products"
                                        class="swiper-wrapper relative -mx-2 flex whitespace-nowrap xl:-mx-4 ">
                                        @foreach ($recommendProducts as $each)
                                            <li class="swiper-slide relative inline-block shrink-0 whitespace-normal px-2"
                                                style="width: calc(25%); transform: translateX(0%) translateZ(0px);">
                                                <div class="transitionEffect relative rounded-2xl p-3 shadow-md bg-white">
                                                    <div
                                                        class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                                        <a class="h-[250px] w-full lg:h-[220px]"
                                                            href="/products/{{ $each['slug'] }}">
                                                            <img alt="BRSB cover photo" loading="lazy" width="592"
                                                                height="592" decoding="async" data-nimg="1"
                                                                class="h-full w-full object-cover object-bottom"
                                                                src="/storage/{{ $each['image_url'] }}"
                                                                style="color: transparent;"></a>
                                                    </div>
                                                    <div class="mt-3">
                                                        <div class="flex items-center justify-between">
                                                            <h3 class="font-semibold">{{ $each['name'] }}</h3>
                                                            <p class="text-neutral-500 block text-sm line-through"></p>
                                                        </div>
                                                        <div class="flex items-center justify-between">
                                                            <p class="text-sm text-neutral-500">
                                                                {{ $each['category_name'] }}</p>
                                                            <p class="text-lg font-medium text-primary">
                                                                {{ $each['price_sale'] }} Đ</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="swiper-button-next p-5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/blog" id="event-banner" class="container lg:my-8">
            <img src="/images/static/blog_banner.png" alt="Blog Banner" class="w-full h-auto rounded-2xl">
        </a>
        <div class="container flex flex-col items-center justify-center space-y-8">
            <div class="text-right w-full lg:px-4">
                <div class="text-[40px] font-bold">THỂ LOẠI PHỔ BIẾN</div>
                <div class="text-xl font-normal mt-2">
                    Tận Hưởng Muôn Màu Các Loại Bánh Đến Từ Khắp Thế Giới
                </div>
            </div>
            <div class="flex items-center justify-start gap-4 w-full">
                @foreach ($categories as $category)
                    <a href="/products?categoryName={{$category->name}}" class="rounded-2xl border-4 border-primary p-3 lg:w-1/3 w-1/2">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="h-20 w-20 overflow-hidden rounded-lg">
                                    <img alt="logo" loading="lazy" width="130" height="130" decoding="async"
                                        data-nimg="1" class="h-full w-full object-cover object-center"
                                        src="/storage/{{ $category->image }}" style="color: transparent;" />
                                </div>
                                <div>
                                    <div class="flex items-center gap-1 text-lg font-semibold">{{ $category->name }}</div>
                                    <p class="text-sm text-neutral-500">{{ substr($category->description, 0, 50) }}...</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 ">
                            <div class=" overflow-hidden rounded-lg bg-gray">
                                <img alt="shoe" loading="lazy" width="4480" height="4480" decoding="async"
                                    data-nimg="1" class="h-full w-full object-cover object-bottom"
                                    src="/storage/{{ $category->image }}" style="color: transparent;">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="flex items-center justify-center">
                
            </div>
        </div>
        <a href="/contact" id="event-banner" class="container lg:my-8">
            <img src="/images/static/title_banner.png" alt="Title Banner" class="w-full h-auto rounded-2xl">
        </a>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
