@extends('layouts.main')
@section('content')
    <div class="nc-PageLogin" data-nc-id="PageLogin">
        <div class="container mb-24 lg:mb-32">
            <h2
                class="my-20 flex items-center justify-center text-3xl font-semibold leading-[115%] md:text-5xl md:leading-[115%]">
                Đăng Ký Tài Khoản</h2>
            <div class="mx-auto max-w-md">
                <form method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div class="grid gap-6">
                            <div class="">
                                <div class="font-medium">Tên Người Dùng</div>
                                <div class="mt-1.5"><input
                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                        type="text" name="name" ></div>
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <div class="font-medium">Địa Chỉ Email</div>
                                <div class="mt-1.5"><input
                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                        placeholder="example@example.com" type="email" name="email"></div>
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <div class="font-medium">Mật Khẩu</div>
                                <div class="mt-1.5"><input
                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                        type="password" name="password"></div>
                                @error('password')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <div class="font-medium">Nhập Lại Mật Khẩu</div>
                                <div class="mt-1.5"><input
                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                        type="password" name="password_confirmation"> </div>
                                @error('password_confirmation')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 ">
                                Đăng Ký
                            </button>
                        </div>
                        <div class="flex flex-col items-center justify-center gap-2"><a class="text-sm text-primary"
                                href="/forgot-password">Quên Mật Khẩu</a><span
                                class="block text-center text-sm text-neutral-500">Bạn Đã Có Tài Khoản? <a
                                    class="text-primary" href="/login">Đăng Nhập</a></span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
