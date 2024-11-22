@extends('layouts.main')
@section('content')
    <div class="nc-CartPage">
        <main class="container py-16 lg:pb-28 lg:pt-20 ">
            <div class="mb-14">
                <h2 class="block text-2xl font-medium sm:text-3xl lg:text-4xl">Hóa đơn đã mua</h2>
            </div>
            <hr class="my-10 border-neutral-300 xl:my-12">
            <div class="flex flex-col lg:flex-row">
                <div class="w-full divide-y divide-neutral-300 lg:w-[60%] xl:w-[55%]">
                    @forelse ($bills as $index => $item)
                        <details class="group border border-neutral-300 rounded-lg p-4 mb-4">
                            <summary
                                class="cursor-pointer flex items-center justify-between font-medium text-lg text-neutral-700 group-open:text-primary-600">
                                <div class="flex justify-between ">
                                    <div>
                                        <h3 class="font-medium md:text-xl">HD0{{ $index + 1 }}</h3>
                                        <p class="my-1 text-sm text-neutral-500">
                                            @php
                                                $payment_method = [
                                                    '1' => 'Thanh Toán Khi Nhận Hàng',
                                                    '2' => 'Thanh Toán Qua Thẻ',
                                                ];
                                                echo $payment_method[$item->payment_method];
                                            @endphp
                                        </p>
                                        <p class="my-1 text-sm text-neutral-500">
                                            @php
                                                $payment_status = [
                                                    '1' => 'Đã Thanh Toán',
                                                    '2' => 'Chưa Thanh Toán',
                                                ];
                                                echo $payment_status[$item->payment_status] ?? 'Chưa Thanh Toán';
                                            @endphp
                                        </p>
                                        <p class="my-1 text-sm text-neutral-500">
                                            @php
                                                $status = [
                                                    '1' => 'Chờ Xác Nhận',
                                                    '2' => 'Đang Xử Lý',
                                                    '3' => 'Đang Giao Hàng',
                                                    '4' => 'Đã Giao Hàng',
                                                    '5' => 'Đã Hủy',
                                                ];
                                                echo $status[$item->status] ?? 'Chờ Xác Nhận';
                                            @endphp
                                        </p>

                                        <p class="my-1 text-sm text-neutral-500 group-open:hidden">
                                            Xem thêm ...
                                        </p>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center flex-col">
                                    <p class="font-medium md:text-xl">{{ (int) $item->total }} Đ</p>
                                    @if ($item->status == 1)
                                    <form method="POST" action="{{route("bills.cancel", $item->id)}}" class="inline-block">
                                        @csrf
                                        <button
                                            class="flex items-center justify-center h-8 rounded-full bg-red-500 text-white text-sm p-2">
                                            Hủy
                                        </button>
                                    </form>
                                    @endif
                                    @if ($item->payment_status == 2 && $item->payment_method == 2 && $item->status != 5)
                                    <form method="POST" action="{{route("bills.repayment-vnpay", $item->id)}}" class="inline-block">
                                        @csrf
                                        <button
                                            class="mt-1 flex items-center justify-center h-8 rounded-full bg-primary text-white text-sm p-2">
                                            Thanh toán lại
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </summary>
                            <p class="mt-2 text-sm text-neutral-600">
                            <div class="relative overflow-x-auto">
                                <p class="my-1">Thông tin: {{ $item->address->string_address }}</p>
                                <center>
                                    <h3 class="mt-2 border-b md:text-xl">Dánh sách sản phẩm</h3>
                                </center>
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                    <tbody>
                                        <tr class="bg-white border-b ">
                                            @foreach ($item->details as $product)
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <a
                                                        href="/products/{{ $product->product->slug }}">{{ $product->product->name }}</a>
                                                </th>
                                                <td class="px-6 py-4">
                                                    ({{ $product->quantity }})
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $product->price }}
                                                </td>
                                                @if ($product->review && $item->payment_status == 1)
                                                    <td class="px-6 py-4">
                                                        <a class="rounded-full transition-colors text-sm  font-medium py-2 px-3 sm:px-6 rounded-full bg-primary text-white"
                                                            href="/products/{{ $product->product->slug }}">
                                                            Đánh Giá
                                                        </a>
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </details>
                    @empty
                        <p>Không có hóa đơn nào!</p>
                    @endforelse
                </div>
                <div
                    class="my-10 shrink-0 border-t border-neutral-300 lg:mx-10 lg:my-0 lg:border-l lg:border-t-0 xl:mx-16 2xl:mx-20">
                </div>
                <div class="flex-1">
                    <div class="sticky top-28">
                        <h3 class="text-2xl font-semibold">Thông tin của bạn</h3>
                        <div class="mt-7 divide-y divide-neutral-300 text-sm">
                            <div class="flex justify-between pb-4">
                                <span>Tên: </span>
                                <span class="font-semibold">{{ auth()->user()->name }}</span>
                            </div>
                            <div class="flex justify-between py-4">
                                <span>Email: </span>
                                <span class="font-semibold">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                        <button type="button" onclick="document.querySelector('#default-modal').classList.toggle('hidden')"
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 mt-8 w-full"
                            href="#">Cập nhật</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="default-modal"
        class="hidden overflow-y-auto overflow-x-hidden fixed flex top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-[#808080ad]">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Đổi thông tin
                    </h3>
                    <button type="button" onclick="document.querySelector('#default-modal').classList.toggle('hidden')"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="">
                            <div class="font-medium">Tên</div>
                            <div class="mt-1.5"><input
                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-14 px-4 py-5 border-neutral-300 bg-white placeholder:text-neutral-500 focus:border-primary"
                                    value="{{ auth()->user()->name }}" name="name" type="text"></div>
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-primary  focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Lưu</button>
                        <button onclick="document.querySelector('#default-modal').classList.toggle('hidden')" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-100 ">Hủy</button>
                    </div>
                </form>
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
