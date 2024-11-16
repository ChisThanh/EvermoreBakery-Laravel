@extends('layouts.main')
@section('content')
    <div class="nc-PageLogin" data-nc-id="PageLogin">
        <div class="container mb-24 lg:mb-32">
            <h2
                class="my-20 flex items-center justify-center text-3xl font-semibold leading-[115%] md:text-5xl md:leading-[115%]">
                Xác Thực Email
            </h2>
            <div class="mx-auto max-w-md">
                <div class="space-y-6">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <center>
                            <p>Bạn Cần Xác Thực Tài Khoản Để Tiếp Tục Mua Hàng</p>
                            <br>
                            <button type="submit"
                                class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70">
                                Gửi Email
                            </button>
                        </center>
                    </form>
                    <div class="flex flex-col items-center justify-center gap-2"><a class="text-sm text-primary"
                            href="/forgot-password">Quên Mật Khẩu</a><span
                            class="block text-center text-sm text-neutral-500">Bạn Đã Có Tài Khoản? <a class="text-primary"
                                href="/login">Đăng Nhập</a></span></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if (session('verify-email') || session('status'))
        <script>
            openModal("Xác nhận email", "Vui lòng kiểm tra email của bạn để xác nhận tài khoản", "Xác nhận", "Đóng", 0);
        </script>
    @endif
@endpush
