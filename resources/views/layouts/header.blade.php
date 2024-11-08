<div class="nc-Header sticky inset-x-0 top-0 z-50 w-full border-b border-neutral-300 bg-white">
    <div class="hidden bg-black py-3 lg:block">
        <div class="container flex items-center justify-between text-sm text-white">
            <div class="flex items-center divide-x divide-neutral-100">
                <li class="menu-item shrink-0 list-none">
                    <div class="mx-3 flex shrink-0 items-center font-medium hover:text-primary"><a class="list-none"
                            href="/home">Home</a></div>
                </li>
                <li class="menu-item shrink-0 list-none">
                    <div class="mx-3 flex shrink-0 items-center font-medium hover:text-primary"><a class="list-none"
                            href="/blog">Blog</a></div>
                </li>
                <li class="menu-item shrink-0 list-none">
                    <div class="mx-3 flex shrink-0 items-center font-medium hover:text-primary"><a class="list-none"
                            href="/products">Products</a></div>
                </li>
                <li class="menu-item shrink-0 list-none">
                    <div class="mx-3 flex shrink-0 items-center font-medium hover:text-primary"><a class="list-none"
                            href="/contact">Contact</a></div>
                </li>
                <li class="menu-item shrink-0 list-none">
                    <div class="mx-3 flex shrink-0 items-center font-medium hover:text-primary"><a class="list-none"
                            href="/cart">Cart</a></div>
                </li>
                @if (auth()->check())
                    <li class="menu-item shrink-0 list-none">
                        <div class="mx-3 flex shrink-0 items-center font-medium hover:text-primary"><a class="list-none"
                                href="/logout">Logout</a></div>
                    </li>
                @else
                    <li class="menu-item shrink-0 list-none">
                        <div class="mx-3 flex shrink-0 items-center font-medium hover:text-primary"><a class="list-none"
                                href="/login">Login</a></div>
                    </li>
                    <li class="menu-item shrink-0 list-none">
                        <div class="mx-3 flex shrink-0 items-center font-medium hover:text-primary"><a class="list-none"
                                href="/register">Register</a></div>
                    </li>
                @endif
            </div>
            <div class="font-medium">
            </div>
        </div>
    </div>
    <div class="container flex items-center justify-between py-4">
        <div class="flex-1 lg:hidden">
            <button type="button" id="menu-toggle"
                class="flex items-center justify-center rounded-lg p-2.5 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="flex items-center gap-5 lg:basis-[60%]"><a class="flex cursor-pointer items-center gap-2"
                href="/"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                    class="text-3xl text-primary" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M22 12C22 17.5228 17.5228 22 12 22H6.66472C8.68458 20.5479 10 18.1776 10 15.5H12C13.933 15.5 15.5 13.933 15.5 12C15.5 10.067 13.933 8.5 12 8.5C10.067 8.5 8.5 10.067 8.5 12V15.5C8.5 19.0899 5.58985 22 2 22V12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z">
                    </path>
                </svg> <span class="hidden text-2xl font-bold">HotKicks.</span></a>
            <div
                class="hidden w-full max-w-2xl items-center gap-5 rounded-full border border-neutral-300 py-1 pr-3 lg:flex">
                <input type="text"
                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-11 px-4 py-3 border-transparent bg-white placeholder:text-neutral-500 focus:border-transparent"
                    placeholder="try 'Nike Air Jordan'"><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 24 24" class="text-2xl text-neutral-500" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM11 18C14.8675 18 18 14.8675 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z">
                    </path>
                </svg>
            </div>
        </div>
        <div class="flex flex-1 items-center justify-end gap-5">
            <div class="relative hidden lg:block">
                <span class="absolute -top-1/4 left-3/4 aspect-square w-3 rounded-full bg-red-600"></span>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="text-2xl"
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z">
                    </path>
                </svg>
            </div>
            <div class="flex items-center divide-x divide-neutral-300">
                <button type="button" id="cart-button"
                    class="mx-5 flex items-center gap-1 rounded-full bg-neutral-100 p-2 text-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                        class="text-2xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64v48H160V112zm-48 48H48c-26.5 0-48 21.5-48 48V416c0 53 43 96 96 96H352c53 0 96-43 96-96V208c0-26.5-21.5-48-48-48H336V112C336 50.1 285.9 0 224 0S112 50.1 112 112v48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z">
                        </path>
                    </svg>
                    <span class="hidden text-sm lg:block">{{ sizeof($cartDetails) }} items</span>
                </button>
                <div class="flex items-center gap-2 pl-5">
                    <button type="button"
                        class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 overflow-hidden bg-gray w-10 h-10 ">
                        <img alt="avatar" loading="lazy" width="500" height="500" decoding="async"
                            data-nimg="1" class="h-full w-full object-cover object-center" style="color:transparent"
                            src="{{ asset('images/avatar.png') }}">
                    </button>
                    @if (auth()->check())
                        <a class="hidden text-sm lg:block" href="#"> {{ auth()->user()->name }}</a>
                    @else
                        <a class="hidden text-sm lg:block" href="/login">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
