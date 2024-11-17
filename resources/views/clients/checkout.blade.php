@extends('layouts.main')
@section('content')
    <form id="cartForm" action="/checkout" method="POST">
        @csrf
        <div class="nc-CheckoutPage">
            <main class="container py-16 lg:pb-28 lg:pt-20 ">
                <div class="mb-16">
                    <h2 class="block text-2xl font-semibold sm:text-3xl lg:text-4xl ">Thanh Toán</h2>
                </div>
                <div class="flex flex-col lg:flex-row">
                    <div class="flex-1">
                        <div class="space-y-8">
                            <div id="ShippingAddress" class="scroll-mt-24">
                                <div class="rounded-xl border border-neutral-300 ">
                                    <div class="flex flex-col items-start p-6 sm:flex-row"><span class="hidden sm:block">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 512 512" class="text-3xl text-primary" height="1em"
                                                width="1em" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M406.5 399.6C387.4 352.9 341.5 320 288 320H224c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3h64c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z">
                                                </path>
                                            </svg>
                                        </span>
                                        <div class="flex w-full items-center justify-between">
                                            <div class="sm:ml-8">
                                                <span class="uppercase">Thông Tin Nhận Hàng</span>
                                                <div class="mt-1 text-sm font-semibold">
                                                    <span class="">{{ $user->name }}</span>
                                                </div>
                                            </div><button
                                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-2 px-4  border-2 border-primary text-primary">Chỉnh Sửa</button>
                                        </div>
                                    </div>
                                    <div class="space-y-4 border-t border-neutral-300 px-6 py-7 sm:space-y-6 block">
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-3">
                                            <div>
                                                <div class="font-medium">Tên Người Nhận <span class="text-red-600">*</span>
                                                </div>
                                                <div class="mt-1.5">
                                                    <input
                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                        type="text"
                                                        value="{{ isset($address->name) ? $address->name : $user->name }}"
                                                        name="name">
                                                    @error('name')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div>
                                                <div class="font-medium">Số Điện Thoại <span class="text-red-600">*</span>
                                                </div>
                                                <div class="mt-1.5">
                                                    <input
                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                        type="text" value="{{ $address->phone ?? "" }}" name="phone">
                                                    @error('phone')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-3">
                                            <div class="flex-1">
                                                <div class="">
                                                    <div class="font-medium">Địa Chỉ / Đường <span
                                                            class="text-red-600">*</span></div>
                                                    <div class="mt-1.5">
                                                        <input
                                                            class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                            type="text" value="{{ $address->street ?? "" }}" name="street">
                                                        @error('street')
                                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-medium">Thành Phố <span class="text-red-600">*</span>
                                                </div>
                                                <div class="mt-1.5">
                                                    <input
                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                        type="text" name="city" value="{{ $address->city ?? "" }}">
                                                    @error('city')
                                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-3">
                                            <div>
                                                <div class="">
                                                    <div class="font-medium">Quận / Huyện <span
                                                            class="text-red-600">*</span></div>
                                                    <div class="mt-1.5">
                                                        <input
                                                            class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                            type="text" value="{{ $address->district ?? "" }}" name="district">
                                                        @error('district')
                                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="">
                                                    <div class="font-medium">Phường / Xã <span class="text-red-600">*</span>
                                                    </div>
                                                    <div class="mt-1.5">
                                                        <input
                                                            class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                            type="text" name="ward" value="{{ $address->ward ?? "" }}">
                                                        @error('ward')
                                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-medium">Ghi Chú</div>
                                            <div class="mt-1.5">
                                                <textarea
                                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary min-h-[150px]"
                                                    name="note">{{ $address->note ?? "" }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-6">
                                        <div class="">
                                            <div class="font-medium">Thanh Toán <span class="text-red-600">*</span></div>
                                            <div class="mt-1.5">
                                                <div class="mt-1.5 grid grid-cols-1 gap-2 sm:grid-cols-2 sm:gap-3">
                                                    <div class="flex items-center text-sm sm:text-base ">
                                                        <input
                                                            class="focus:ring-action-primary rounded-full border-neutral-400 bg-transparent text-primary hover:border-neutral-700  focus:ring-primary w-6 h-6"
                                                            type="radio" value="cash"name="payment">
                                                        <div class="block select-none pl-2.5 sm:pl-3">Thanh Toán Khi Nhận Hàng</div>
                                                    </div>
                                                    <div class="flex items-center text-sm sm:text-base ">
                                                        <input
                                                            class="focus:ring-action-primary rounded-full border-neutral-400 bg-transparent text-primary hover:border-neutral-700  focus:ring-primary w-6 h-6"
                                                            type="radio" value="card" checked="" name="payment">
                                                        <div class="block select-none pl-2.5 sm:pl-3">Chuyển Khoàn</div>
                                                    </div>
                                                </div>
                                                @error('payment')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col p-6 sm:flex-row">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div
                        class="my-10 shrink-0 border-t border-neutral-300 lg:mx-10 lg:my-0 lg:border-l lg:border-t-0 xl:lg:mx-14 2xl:mx-16 ">
                    </div>
                    <div class="w-full lg:w-[36%] ">
                        <h3 class="text-lg font-semibold">Chi Tiết Đơn Hàng</h3>
                        <div class="mt-8 divide-y divide-neutral-300">
                            @foreach ($data['cartDetails'] as $index => $item)
                                <div class="flex py-5 last:pb-0 js-cart-item">
                                    <input type="hidden" name="products[{{ $index }}][quantity]"
                                        value="{{ $item['quantity'] }}">
                                    <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-xl md:h-40 md:w-40">
                                        <img alt="#" loading="lazy" decoding="async" data-nimg="fill"
                                            class="h-full w-full object-contain object-center" sizes="100vw"
                                            src="{{ asset('storage/' . $item['image']) }}"
                                            style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"><a
                                            class="absolute inset-0" href="/products/{{ $item['slug'] }}"></a>
                                    </div>
                                    <div class="ml-4 flex flex-1 flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between ">
                                                <div>
                                                    <h4 class="font-medium md:text-xl ">
                                                        <a
                                                            href="/products/{{ $item['slug'] }}">{{ $item['product_name'] }}</a>
                                                    </h4>
                                                    <span class="my-1 text-sm text-neutral-500">
                                                        {{ $item['category_name'] }}
                                                    </span>
                                                </div>
                                                <span class="font-medium md:text-xl">{{ $item['total'] }} Đ</span>
                                            </div>
                                        </div>
                                        <div class="flex w-full items-end justify-between text-sm">
                                            <div class="flex items-center gap-3">
                                                <button type="button"
                                                    onclick="removeItemCart(this,'{{ $item['slug'] }}')">
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                        viewBox="0 0 1024 1024" class="text-2xl" height="1em"
                                                        width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div>
                                                <div
                                                    class="nc-InputNumber flex items-center justify-between space-x-5 w-full">
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
                            @endforeach

                        </div>
                        <div class="mt-10 border-t border-neutral-300 pt-6 text-sm">
                            <div>
                                <div class="text-sm">Coupon Giảm Giá</div>
                                <div class="mt-1.5 flex">
                                    <input
                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 flex-1 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                        type="text" name="coupon_code">
                                    <button type="button" data-click="true" onclick="applyCoupon(this)"
                                        class="ml-3 flex w-24 items-center justify-center rounded-2xl border border-neutral-300 bg-gray px-4 text-sm font-medium transition-colors hover:bg-neutral-100">
                                        Áp Dụng
                                    </button>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between pb-4">
                                <span>Tổng Phụ</span>
                                <span class="font-semibold js-subtotal">{{ $data['total'] ?? 0 }} Đ</span>
                            </div>
                            <div class="flex justify-between py-4">
                                <span>Phí Vận Chuyển</span>
                                <span class="font-semibold">50000 Đ</span>
                            </div>
                            <div class="flex justify-between pt-4 text-base font-semibold">
                                <span>Tổng Cộng</span>
                                <span class="js-total">{{ $data['total'] + 50000 ?? 0 + 50000 }} Đ</span>
                            </div>
                        </div><button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 mt-8 w-full">
                            Xác Nhận Đơn Hàng
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </form>
@endsection
@push('scripts')
    <script>
        @if (session('error'))
            openToast('error', '{{ session('error') }}', 5000);
        @endif
    </script>
@endpush
