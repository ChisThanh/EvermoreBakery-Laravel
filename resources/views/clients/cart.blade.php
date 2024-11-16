@extends('layouts.main')
@section('content')
    <div class="nc-CartPage">
        <main class="container py-16 lg:pb-28 lg:pt-20 ">
            <div class="mb-14">
                <h2 class="block text-2xl font-medium sm:text-3xl lg:text-4xl">Your Cart</h2>
            </div>
            <hr class="my-10 border-neutral-300 xl:my-12">
            <div class="flex flex-col lg:flex-row">
                <div class="w-full divide-y divide-neutral-300 lg:w-[60%] xl:w-[55%]">
                    @forelse ($data['cartDetails'] as $item)
                        <div class="flex py-5 last:pb-0 js-cart-item">
                            <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-xl md:h-40 md:w-40"><img
                                    alt="Air Force 1" loading="lazy" decoding="async" data-nimg="fill"
                                    class="h-full w-full object-contain object-center" sizes="100vw"
                                    src="{{ asset('storage/' . $item['image']) }}"
                                    style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"><a
                                    class="absolute inset-0" href="/products/airForce1"></a></div>
                            <div class="ml-4 flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="flex justify-between ">
                                        <div>
                                            <h3 class="font-medium md:text-2xl ">
                                                <a href="/products/{{ $item['slug'] }}">{{ $item['product_name'] }}</a>
                                            </h3>
                                            <span class="my-1 text-sm text-neutral-500">{{ $item['category_name'] }}</span>

                                        </div><span class="font-medium md:text-xl">{{ $item['total'] }} Đ</span>
                                    </div>
                                </div>
                                <div class="flex w-full items-end justify-between text-sm">
                                    <div class="flex items-center gap-3">
                                        <button onclick="removeItemCart(this,'{{ $item['slug'] }}')">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 1024 1024" class="text-2xl" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div>
                                        <div class="nc-InputNumber flex items-center justify-between space-x-5 w-full">
                                            <div
                                                class="js-item-quantity-container flex w-[104px] items-center justify-between sm:w-28">
                                                <button onclick="updateQuantity(this, '{{ $item['slug'] }}', -1)"
                                                    class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-300 bg-white text-xl hover:border-neutral-700 focus:outline-none disabled:cursor-default disabled:opacity-50 disabled:hover:border-neutral-400"
                                                    type="button">
                                                    -
                                                </button>
                                                <span
                                                    class="js-item-quantity block flex-1 select-none text-center leading-none">
                                                    {{ $item['quantity'] }}
                                                </span>
                                                <button onclick="updateQuantity(this, '{{ $item['slug'] }}', 1)"
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
                    @empty
                        <center>Không có gì trong giỏ hàng</center>
                    @endforelse
                </div>
                <div
                    class="my-10 shrink-0 border-t border-neutral-300 lg:mx-10 lg:my-0 lg:border-l lg:border-t-0 xl:mx-16 2xl:mx-20">
                </div>
                <div class="flex-1">
                    <div class="sticky top-28">
                        <h3 class="text-2xl font-semibold">Summary</h3>
                        <div class="mt-7 divide-y divide-neutral-300 text-sm">
                            <div class="flex justify-between pb-4">
                                <span>Subtotal</span>
                                <span class="font-semibold">{{ $data['total'] }} Đ</span>
                            </div>
                            <div class="flex justify-between py-4">
                                <span>Estimated Delivery &amp; Handling</span>
                                <span class="font-semibold">Free</span>
                            </div>
                            <div class="flex justify-between pt-4 text-base font-semibold">
                                <span>Total</span>
                                <span>{{ $data['total'] }} Đ</span>
                            </div>
                        </div><a
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 mt-8 w-full"
                            href="/checkout">Checkout Now</a><a
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  mt-3 inline-flex w-full items-center gap-1 border-2 border-primary text-primary"
                            href="/checkout"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round" class="text-2xl" height="1em"
                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M10 13l2.5 0c2.5 0 5 -2.5 5 -5c0 -3 -1.9 -5 -5 -5h-5.5c-.5 0 -1 .5 -1 1l-2 14c0 .5 .5 1 1 1h2.8l1.2 -5c.1 -.6 .4 -1 1 -1zm7.5 -5.8c1.7 1 2.5 2.8 2.5 4.8c0 2.5 -2.5 4.5 -5 4.5h-2.6l-.6 3.6a1 1 0 0 1 -1 .8l-2.7 0a.5 .5 0 0 1 -.5 -.6l.2 -1.4">
                                </path>
                            </svg>PayPal</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
