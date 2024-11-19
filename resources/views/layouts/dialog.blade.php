<!-- Cart Right -->
<div class="fixed inset-0 z-[9999999999999999] overflow-y-auto hidden" id="main-cart">
    <div class="z-max fixed inset-y-0 right-0 w-full max-w-md outline-none focus:outline-none md:max-w-md">
        <div class="relative z-20 opacity-100 translate-x-0">
            <div class="overflow-hidden shadow-lg ring-1 ring-black/5">
                <div class="relative h-screen bg-white">
                    <div class="hiddenScrollbar h-screen overflow-y-auto p-5 d-none">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold">Shopping cart</h3>
                            <button type="button" id="main-cart-close"
                                class="flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70    ">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                    class="text-2xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="divide-y divide-neutral-300">
                            @foreach ($cartDetails as $item)
                                <div class="flex py-5 last:pb-0 js-cart-item">
                                    <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-xl">
                                        <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                            class="h-full w-full object-contain object-center" sizes="100vw"
                                            style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"
                                            src="{{ asset('storage/' . $item['image']) }}">
                                        <a class="absolute inset-0" href="/products/{{ $item['slug'] ?? '' }}"></a>
                                    </div>
                                    <div class="ml-4 flex flex-1 flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between ">
                                                <div>
                                                    <h3 class="font-medium ">
                                                        <a href="/products/{{ $item['slug'] ?? '' }}">
                                                            {{ $item['product_name'] }}
                                                        </a>
                                                    </h3>
                                                    <span class="my-1 text-sm text-neutral-500">
                                                        {{ $item['category_name'] }}
                                                    </span>
                                                </div>
                                                <span class=" font-medium js-item-price">{{ $item['price'] }} Đ</span>
                                            </div>
                                        </div>
                                        <div class="flex w-full items-end justify-between text-sm">
                                            <button onclick="removeItemCart(this,'{{ $item['slug'] }}')">
                                                <div class="flex items-center gap-3 cursor-pointer">
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                        viewBox="0 0 1024 1024" class="text-2xl" height="1em"
                                                        width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </button>
                                            <div>
                                                <div class=" flex items-center justify-between space-x-5 w-full">
                                                    <div
                                                        class=" flex w-[104px] items-center justify-between sm:w-28 js-item-quantity-container">
                                                        <button
                                                            onclick="updateQuantity(this, '{{ $item['slug'] }}', -1)"
                                                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-300 bg-white text-xl hover:border-neutral-700 focus:outline-none disabled:cursor-default disabled:opacity-50 disabled:hover:border-neutral-400"
                                                            type="button">
                                                            -
                                                        </button>
                                                        <span
                                                            class="block flex-1 select-none text-center leading-none js-item-quantity">
                                                            {{ $item['quantity'] }}
                                                        </span>
                                                        <button
                                                            onclick="updateQuantity(this, '{{ $item['slug'] }}', 1)"
                                                            class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-300 bg-white text-xl hover:border-neutral-700 focus:outline-none disabled:cursor-default disabled:opacity-50 disabled:hover:border-neutral-400"
                                                            type="button">
                                                            +
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full bg-neutral-50 p-5">
                        <p class="flex justify-between">
                            <span>
                                <span class="font-medium">Subtotal</span>
                                <span class="block text-sm text-neutral-500">
                                    Shipping and taxes calculated at checkout.
                                </span>
                            </span>
                            <span class="text-xl font-medium js-cart-total">
                                {{ isset($carts['total']) ? (int) $carts['total'] : 0 }} Đ
                            </span>
                        </p>
                        <div class="mt-5 flex items-center gap-5"><a
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 w-full flex-1"
                                href="/checkout">Checkout</a><a
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  w-full flex-1 border-2 border-primary text-primary"
                                href="/cart">View cart</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed inset-0 bg-neutral-900/60 opacity-100" id="headlessui-dialog-overlay-:r7:"
            aria-hidden="true" data-headlessui-state="open"></div>
    </div>
</div>

<!-- Menu Mobile -->
<div class="fixed inset-0 z-50 overflow-y-auto hidden" id="main-menu-toggle">
    <div class="z-max fixed inset-y-0 left-0 w-full max-w-md outline-none focus:outline-none md:w-auto">
        <div class="relative z-20 opacity-100 translate-x-0">
            <div
                class="h-screen w-full divide-y divide-neutral-300 overflow-y-auto bg-white py-2 shadow-lg ring-1 transition">
                <div class="px-5 py-2"><a class="flex cursor-pointer items-center gap-2" href="/">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            class="text-3xl text-primary" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22 12C22 17.5228 17.5228 22 12 22H6.66472C8.68458 20.5479 10 18.1776 10 15.5H12C13.933 15.5 15.5 13.933 15.5 12C15.5 10.067 13.933 8.5 12 8.5C10.067 8.5 8.5 10.067 8.5 12V15.5C8.5 19.0899 5.58985 22 2 22V12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z">
                            </path>
                        </svg>
                        <span class="block text-2xl font-bold">HotKicks.</span>
                    </a>
                    <span class="absolute right-2 top-2 p-1 cursor-pointer" id="close-menu-toggle">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                            </path>
                        </svg>
                    </span>
                </div>
                <ul class="flex flex-col space-y-5 px-5 py-6"><a class="capitalize" href="/home">Home</a><a
                        class="capitalize" href="/blog">Blog</a><a class="capitalize"
                        href="/products">Collection</a><a class="capitalize" href="/contact">Contact</a><a
                        class="capitalize" href="/faqs">FAQ</a><a class="capitalize"
                        href="/checkout">Checkout</a><a class="capitalize" href="/cart">Cart</a></ul>
            </div>
        </div>
        <div class="fixed inset-0 bg-neutral-900/60 opacity-100" id="headlessui-dialog-overlay-:r1:"
            aria-hidden="true" data-headlessui-state="open"></div>
    </div>
</div>

<!-- Search Bar -->
<div class="hidden sticky top-[81px] inset-x-0 z-50 container flex items-center py-4 justify-between bg-white text-primary border-b border-neutral-200" id="search-section">
    <div class="lg:flex hidden items-center divide-x-2 divide-primary">
        <div class="mx-3 flex items-center space-x-3">
            <div class="text-xs text-center font-semibold">
                Thể Loại<br>Được Chọn
            </div>
            @for($i = 0; $i < 5; $i++)
                <a class="cursor-pointer rounded-full border-2 border-primary hover:opacity-50" href="/"><img src="https://picsum.photos/id/237/200/300" alt="Logo" class="rounded-full w-12 h-12"></a>
            @endfor
        </div>
        <div class="mx-3 flex items-center space-x-3">
            <div class="ml-3 text-xs  font-semibold">Blog Mới</div>
            @for($i = 0; $i < 5; $i++)
                <a class="cursor-pointer rounded-full border-2 border-primary hover:opacity-50" href="/"><img src="https://picsum.photos/id/236/200/300" alt="Logo" class="rounded-full w-12 h-12"></a>
            @endfor
        </div>
    </div>
    <div class="w-full lg:max-w-lg items-center gap-5 py-1 pr-3 flex">
        <input type="text" class="js-search-main block w-full rounded-full text-sm font-normal h-11 px-4 py-3 border-2 border-primary bg-white placeholder:text-primary focus:border-transparent focus:ring-2 focus:ring-[#dda54a]" placeholder="Nhập sản phẩm... " oninput="debouncedSearch(this)">
        <span class="cursor-pointer" onclick="handelSearch()">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-2xl text-neutral-500" height="1em" width="1em" viewBox="0 0 512 512">
                <path fill="#451c0d" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
            </svg>
        </span>
    </div>
</div>