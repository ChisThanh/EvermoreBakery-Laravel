<div class="nc-Header sticky inset-x-0 top-0 z-50 w-full bg-secondary text-primary border-b border-neutral-200">
    <div class="container flex items-center justify-around py-4">
        <div class="flex-1 lg:hidden">
            <button type="button" id="menu-toggle" class="flex items-center justify-center rounded-lg p-2.5 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 448 512">
                    <path fill="#451c0d" d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
                </svg>
            </button>
        </div>
        <div class="relative hidden lg:block w-1/3">
            <div class="flex items-center">
                <div class="mx-3 flex shrink-0 items-center font-medium decoration-primary decoration-2 underline-offset-8 hover:underline">
                    <a class="list-none" href="/home">Trang Chủ</a>
                </div>
                <div class="mx-3 flex shrink-0 items-center font-medium decoration-primary decoration-2 underline-offset-8 hover:underline">
                    <a class="list-none" href="/blog">Blog</a>
                </div>
                <div class="mx-3 flex shrink-0 items-center font-medium decoration-primary decoration-2 underline-offset-8 hover:underline">
                    <a class="list-none"href="/products">Sản Phẩm</a>
                </div>
                <div class="mx-3 flex shrink-0 items-center font-medium decoration-primary decoration-2 underline-offset-8 hover:underline">
                    <a class="list-none" href="/contact">Liên Hệ</a>
                </div>
            </div>
        </div>
        <a class="flex cursor-pointer justify-center items-center gap-2 w-1/3" href="/">
            <img src="/images/static/logo.png" alt="Logo" class="w-12 h-12">
            <span class="hidden lg:block text-xl font-medium">Evermore Bakery</span>
        </a>
        <div class="flex items-center lg:w-1/3 justify-end">
            <button type="button" class="w-8 h-8 mx-3 flex items-center rounded-full p-2 bg-primary" id="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#fff9ed" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                </svg>
            </button>
            <button type="button" class="w-8 h-8 mx-3 relative flex items-center rounded-full p-2 bg-primary" id="cart-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path fill="#fff9ed" d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                </svg>
                @if(auth()->check())
                    <div class="absolute inline-flex items-center justify-center w-6 h-6 p-1 text-xs font-semibold text-white bg-tertiary border border-white rounded-full -top-[18px] -end-[18px]">
                        {{ sizeof($cartDetails) }}
                    </div>
                @endif
            </button>
            @if(auth()->check())
                <button type="button" class="w-8 h-8 mx-3 flex items-center rounded-full border border-primary overflow-hidden" id="user-button">
                    <img alt="avatar" loading="lazy" width="500" height="500" decoding="async" data-nimg="1" 
                    class="object-cover object-center bg-transparent" src="{{ asset('images/avatar.png') }}">
                </button>
            @else
                <button type="button" class="w-8 h-8 mx-3 flex items-center rounded-full p-2 bg-primary"  onclick="window.location.href='/login'">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="#fff9ed" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/>
                    </svg>
                </button>
            @endif
        </div>
    </div>
</div>