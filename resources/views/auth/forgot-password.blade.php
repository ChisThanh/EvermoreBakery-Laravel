@extends('layouts.main')
@section('content')
    <div class="nc-PageLogin" data-nc-id="PageLogin">
        <div class="container mb-24 lg:mb-32">
            <h2
                class="my-20 flex items-center justify-center text-3xl font-semibold leading-[115%] md:text-5xl md:leading-[115%]">
                Quên mật khẩu</h2>
            <div class="mx-auto max-w-md">
                <div class="space-y-6">
                    <form method="POST">
                        @csrf
                        <div class="grid gap-6">
                            <div class="">
                                <div class="font-medium">Nhập địa chỉ email</div>
                                <div class="mt-1.5">
                                    <input
                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                        placeholder="example@example.com" type="email" name="email"
                                        autocomplete="email" />
                                    @error('email')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70">
                                Tiếp tục
                            </button>
                        </div>
                    </form>
                    <div class="flex flex-col items-center justify-center gap-2">
                        <span class="block text-center text-sm text-neutral-500">Bạn đã có tài khoản <a class="text-primary"
                                href="/login">Đăng nhập</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
