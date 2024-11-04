@extends('layouts.main')
@section('content')
    <div class="nc-PageLogin" data-nc-id="PageLogin">
        <div class="container mb-24 lg:mb-32">
            <h2
                class="my-20 flex items-center justify-center text-3xl font-semibold leading-[115%] md:text-5xl md:leading-[115%]">
                Register</h2>
            <div class="mx-auto max-w-md">
                <div class="space-y-6">
                    <div class=""><button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  flex w-full items-center gap-3 border-2 border-primary text-primary"><svg
                                stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 488 512"
                                class="text-2xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                </path>
                            </svg> Continue with Google</button></div>
                    <div class="relative text-center"><span
                            class="relative z-10 inline-block rounded-full bg-gray px-4 text-sm font-medium ">OR</span>
                        <div class="absolute left-0 top-1/2 w-full -translate-y-1/2 border border-neutral-300"></div>
                    </div>
                    <div class="grid gap-6">
                        <div class="">
                            <div class="font-medium">Email address</div>
                            <div class="mt-1.5"><input
                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                    placeholder="example@example.com" type="email"></div>
                        </div>
                        <div class="">
                            <div class="font-medium">Password</div>
                            <div class="mt-1.5"><input
                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                    type="password"></div>
                        </div><button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 ">Continue</button>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-2"><a class="text-sm text-primary"
                            href="/forgot-pass">Forgot password</a><span
                            class="block text-center text-sm text-neutral-500">Don't have an account? <a
                                class="text-primary" href="/signup">Signup</a></span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
