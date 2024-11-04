@extends('layouts.main')
@section('content')
    <div class="nc-CheckoutPage">
        <main class="container py-16 lg:pb-28 lg:pt-20 ">
            <div class="mb-16">
                <h2 class="block text-2xl font-semibold sm:text-3xl lg:text-4xl ">Checkout</h2>
            </div>
            <div class="flex flex-col lg:flex-row">
                <div class="flex-1">
                    <div class="space-y-8">
                        <div id="ContactInfo" class="scroll-mt-24">
                            <div class="z-0 overflow-hidden rounded-xl border border-neutral-300">
                                <div class="flex flex-col items-start p-6 sm:flex-row "><span class="hidden sm:block"><svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                            class="text-3xl text-primary" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M406.5 399.6C387.4 352.9 341.5 320 288 320H224c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3h64c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z">
                                            </path>
                                        </svg></span>
                                    <div class="flex w-full items-center justify-between">
                                        <div class="sm:ml-8">
                                            <div class="uppercase tracking-tight">CONTACT INFORMATION</div>
                                            <div class="mt-1 text-sm font-semibold"><span class="">Clark
                                                    Kent</span><span class="ml-3 tracking-tighter">+123-456-7890</span>
                                            </div>
                                        </div><button
                                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-2 px-4  border-2 border-primary text-primary">Edit</button>
                                    </div>
                                </div>
                                <div class="space-y-4 border-t border-neutral-300 px-6 py-7 sm:space-y-6 hidden">
                                    <h3 class="text-lg font-semibold">Contact infomation</h3>
                                    <div class="max-w-lg">
                                        <div class="">
                                            <div class="font-medium">Your phone number</div>
                                            <div class="mt-1.5"><input
                                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                    type="tel" value="+808 xxx"></div>
                                        </div>
                                    </div>
                                    <div class="max-w-lg">
                                        <div class="">
                                            <div class="font-medium">Email address</div>
                                            <div class="mt-1.5"><input
                                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                    type="email"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex text-sm sm:text-base !text-sm"><input id="uudai"
                                                class="focus:ring-action-primary hover:border-neutarl-700 rounded border-neutral-400 bg-transparent text-primary  focus:ring-primary w-6 h-6"
                                                type="checkbox" checked="" name="uudai">
                                            <div class="flex flex-1 select-none flex-col justify-center pl-2.5 sm:pl-3.5">
                                                <span class=" ">Email me news and offers</span></div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col pt-6 sm:flex-row"><button
                                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 shadow-none sm:!px-7">Save
                                            and go to Shipping</button><button
                                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  mt-3 sm:ml-3 sm:mt-0">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="ShippingAddress" class="scroll-mt-24">
                            <div class="rounded-xl border border-neutral-300 ">
                                <div class="flex flex-col items-start p-6 sm:flex-row"><span class="hidden sm:block"><svg
                                            stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                            stroke-linecap="round" stroke-linejoin="round" class="text-3xl text-primary"
                                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                            <path d="M3 9l4 0"></path>
                                        </svg></span>
                                    <div class="flex w-full items-center justify-between">
                                        <div class="sm:ml-8"><span class="uppercase">SHIPPING ADDRESS</span>
                                            <div class="mt-1 text-sm font-semibold"><span class="">1234 Main Street,
                                                    Apt 567, Cityville, State</span></div>
                                        </div><button
                                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-2 px-4  border-2 border-primary text-primary">Edit</button>
                                    </div>
                                </div>
                                <div class="space-y-4 border-t border-neutral-300 px-6 py-7 sm:space-y-6 block">
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-3">
                                        <div>
                                            <div class="">
                                                <div class="font-medium">First name</div>
                                                <div class="mt-1.5"><input
                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                        type="text" value="Clark"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="">
                                                <div class="font-medium">Last name</div>
                                                <div class="mt-1.5"><input
                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                        type="text" value="Kent"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space-y-4 sm:flex sm:space-x-3 sm:space-y-0">
                                        <div class="flex-1">
                                            <div class="">
                                                <div class="font-medium">Address</div>
                                                <div class="mt-1.5"><input
                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                        placeholder="" type="text" value="1234 Main Street"></div>
                                            </div>
                                        </div>
                                        <div class="sm:w-1/3">
                                            <div class="">
                                                <div class="font-medium">Apt, Suite *</div>
                                                <div class="mt-1.5"><input
                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                        type="text" value="567"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-3">
                                        <div>
                                            <div class="">
                                                <div class="font-medium">City</div>
                                                <div class="mt-1.5"><input
                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                        type="text" value="Cityville"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="">
                                                <div class="font-medium">Country</div>
                                                <div class="mt-1.5"><select
                                                        class="nc-Select h-12 px-4 py-3 rounded-lg border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary block w-full rounded-full border-transparent bg-gray text-sm focus:border-transparent focus:ring focus:ring-transparent focus:ring-opacity-50">
                                                        <option value="United States">United States</option>
                                                        <option value="United States">Canada</option>
                                                        <option value="United States">Mexico</option>
                                                        <option value="United States">Israel</option>
                                                        <option value="United States">France</option>
                                                        <option value="United States">England</option>
                                                        <option value="United States">Laos</option>
                                                        <option value="United States">China</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-3">
                                        <div>
                                            <div class="">
                                                <div class="font-medium">State/Province</div>
                                                <div class="mt-1.5"><input
                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                        type="text" value="Arizona"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="">
                                            <div class="font-medium">Postal code</div>
                                            <div class="mt-1.5"><input
                                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                    type="text" value="12345"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-6">
                                    <div class="">
                                        <div class="font-medium">Address type</div>
                                        <div class="mt-1.5">
                                            <div class="mt-1.5 grid grid-cols-1 gap-2 sm:grid-cols-2 sm:gap-3">
                                                <div class="flex items-center text-sm sm:text-base "><input
                                                        id="Address-type-home"
                                                        class="focus:ring-action-primary rounded-full border-neutral-400 bg-transparent text-primary hover:border-neutral-700  focus:ring-primary w-6 h-6"
                                                        type="radio" value="Address-type-home" checked=""
                                                        name="Address-type">
                                                    <div class="block select-none pl-2.5 sm:pl-3">Home(All Day Delivery)
                                                    </div>
                                                </div>
                                                <div class="flex items-center text-sm sm:text-base "><input
                                                        id="Address-type-office"
                                                        class="focus:ring-action-primary rounded-full border-neutral-400 bg-transparent text-primary hover:border-neutral-700  focus:ring-primary w-6 h-6"
                                                        type="radio" value="Address-type-office" name="Address-type">
                                                    <div class="block select-none pl-2.5 sm:pl-3">Office(Delivery 9 AM - 5
                                                        PM)</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col p-6 sm:flex-row"><button
                                        class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 shadow-none sm:!px-7">Save
                                        and go to Payment</button><button
                                        class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  mt-3 sm:ml-3 sm:mt-0">Cancel</button>
                                </div>
                            </div>
                        </div>
                        <div id="PaymentMethod" class="scroll-mt-24">
                            <div class="rounded-xl border border-neutral-300 ">
                                <div class="flex flex-col items-start p-6 sm:flex-row"><span class="hidden sm:block"><svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-3xl text-primary" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                                            <path
                                                d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h5v-2H4v-6h18V6c0-1.11-.89-2-2-2zm0 4H4V6h16v2zm-5.07 11.17l-2.83-2.83-1.41 1.41L14.93 22 22 14.93l-1.41-1.41-5.66 5.65z">
                                            </path>
                                        </svg></span>
                                    <div class="flex w-full items-center justify-between">
                                        <div class="sm:ml-8">
                                            <h3 class="uppercase tracking-tight">PAYMENT METHOD</h3>
                                            <div class="mt-1 text-sm font-semibold"><span
                                                    class="">PayPal</span><span class="ml-3">xxx-xxx-xx55</span>
                                            </div>
                                        </div><button
                                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-2 px-4  border-2 border-primary text-primary">Edit</button>
                                    </div>
                                </div>
                                <div class="space-y-6 border-t border-neutral-300 px-6 py-7 hidden">
                                    <div>
                                        <div class="flex items-start space-x-4 sm:space-x-6">
                                            <div class="flex items-center text-sm sm:text-base pt-3.5"><input
                                                    id="Credit-Card"
                                                    class="focus:ring-action-primary rounded-full border-neutral-400 bg-transparent text-primary hover:border-neutral-700  focus:ring-primary w-6 h-6"
                                                    type="radio" value="Credit-Card" checked=""
                                                    name="payment-method"></div>
                                            <div class="flex-1">
                                                <div class="flex items-center space-x-4 sm:space-x-6">
                                                    <div class="rounded-xl border-2 p-2.5 border-primary"><svg
                                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                                            viewBox="0 0 576 512" class="text-3xl" height="1em"
                                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z">
                                                            </path>
                                                        </svg></div>
                                                    <p class="font-medium">Debit / Credit Card</p>
                                                </div>
                                                <div class="mb-4 mt-6 space-y-3 sm:space-y-5 block">
                                                    <div class="max-w-lg">
                                                        <div class="">
                                                            <div class="font-medium">Card number</div>
                                                            <div class="mt-1.5"><input
                                                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                                    autocomplete="off" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="max-w-lg">
                                                        <div class="">
                                                            <div class="font-medium">Card holder name</div>
                                                            <div class="mt-1.5"><input
                                                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                                    autocomplete="off" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="flex flex-col space-y-3 sm:flex-row sm:space-x-3 sm:space-y-0">
                                                        <div class="sm:w-2/3">
                                                            <div class="">
                                                                <div class="font-medium">Expiration date (MM/YY)</div>
                                                                <div class="mt-1.5"><input
                                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                                        autocomplete="off" placeholder="MM/YY"
                                                                        type="text"></div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div class="">
                                                                <div class="font-medium">CVC</div>
                                                                <div class="mt-1.5"><input
                                                                        class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                                        autocomplete="off" placeholder="CVC"
                                                                        type="text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-start space-x-4 sm:space-x-6">
                                            <div class="flex items-center text-sm sm:text-base pt-3.5"><input
                                                    id="Wallet"
                                                    class="focus:ring-action-primary rounded-full border-neutral-400 bg-transparent text-primary hover:border-neutral-700  focus:ring-primary w-6 h-6"
                                                    type="radio" value="Wallet" name="payment-method"></div>
                                            <div class="flex-1">
                                                <div class="flex items-center space-x-4 sm:space-x-6 ">
                                                    <div class="rounded-xl border-2 p-2.5 border-neutral-300"><svg
                                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                                            viewBox="0 0 384 512" class="text-3xl" height="1em"
                                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M111.4 295.9c-3.5 19.2-17.4 108.7-21.5 134-.3 1.8-1 2.5-3 2.5H12.3c-7.6 0-13.1-6.6-12.1-13.9L58.8 46.6c1.5-9.6 10.1-16.9 20-16.9 152.3 0 165.1-3.7 204 11.4 60.1 23.3 65.6 79.5 44 140.3-21.5 62.6-72.5 89.5-140.1 90.3-43.4.7-69.5-7-75.3 24.2zM357.1 152c-1.8-1.3-2.5-1.8-3 1.3-2 11.4-5.1 22.5-8.8 33.6-39.9 113.8-150.5 103.9-204.5 103.9-6.1 0-10.1 3.3-10.9 9.4-22.6 140.4-27.1 169.7-27.1 169.7-1 7.1 3.5 12.9 10.6 12.9h63.5c8.6 0 15.7-6.3 17.4-14.9.7-5.4-1.1 6.1 14.4-91.3 4.6-22 14.3-19.7 29.3-19.7 71 0 126.4-28.8 142.9-112.3 6.5-34.8 4.6-71.4-23.8-92.6z">
                                                            </path>
                                                        </svg></div>
                                                    <p class="font-medium">Paypal</p>
                                                </div>
                                                <div class="mb-4 mt-6 space-y-6 hidden">
                                                    <div class="max-w-lg">
                                                        <div class="">
                                                            <div class="font-medium">PayPal email</div>
                                                            <div class="mt-1.5"><input
                                                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                                                    autocomplete="off" type="text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex pt-6"><button
                                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 w-full max-w-[240px]">Confirm
                                            order</button><button
                                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  ml-3">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="my-10 shrink-0 border-t border-neutral-300 lg:mx-10 lg:my-0 lg:border-l lg:border-t-0 xl:lg:mx-14 2xl:mx-16 ">
                </div>
                <div class="w-full lg:w-[36%] ">
                    <h3 class="text-lg font-semibold">Order summary</h3>
                    <div class="mt-8 divide-y divide-neutral-300">
                        <div class="flex py-5 last:pb-0">
                            <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-xl md:h-40 md:w-40"><img
                                    alt="Air Force 1" loading="lazy" decoding="async" data-nimg="fill"
                                    class="h-full w-full object-contain object-center" sizes="100vw"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=3840&amp;q=75 3840w"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FairForce1.490466ef.webp&amp;w=3840&amp;q=75"
                                    style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"><a
                                    class="absolute inset-0" href="/products/airForce1"></a></div>
                            <div class="ml-4 flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="flex justify-between ">
                                        <div>
                                            <h3 class="font-medium md:text-2xl "><a href="/products/airForce1">Air Force
                                                    1</a></h3><span class="my-1 text-sm text-neutral-500">Men's
                                                shoes</span>
                                            <div class="flex items-center gap-1"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                                    class="text-yellow-400" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path
                                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                                    </path>
                                                </svg><span class="text-sm">4.8</span></div>
                                        </div><span class="font-medium md:text-xl">$199</span>
                                    </div>
                                </div>
                                <div class="flex w-full items-end justify-between text-sm">
                                    <div class="flex items-center gap-3"><button type="button"
                                            class="flex h-9 w-9 items-center justify-center rounded-full bg-white "><svg
                                                class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                    stroke="currentColor" fill="none" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></button><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 1024 1024" class="text-2xl" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z">
                                            </path>
                                        </svg></div>
                                    <div>
                                        <div class="nc-InputNumber flex items-center justify-between space-x-5 w-full">
                                            <div
                                                class="nc-NcInputNumber__content flex w-[104px] items-center justify-between sm:w-28">
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-300 bg-white text-xl hover:border-neutral-700 focus:outline-none disabled:cursor-default disabled:opacity-50 disabled:hover:border-neutral-400"
                                                    type="button" disabled="">-</button><span
                                                    class="block flex-1 select-none text-center leading-none">1</span><button
                                                    class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-300 bg-white text-xl hover:border-neutral-700 focus:outline-none disabled:cursor-default disabled:opacity-50 disabled:hover:border-neutral-400"
                                                    type="button">+</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex py-5 last:pb-0">
                            <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-xl md:h-40 md:w-40"><img
                                    alt="Lebron Black" loading="lazy" decoding="async" data-nimg="fill"
                                    class="h-full w-full object-contain object-center" sizes="100vw"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=3840&amp;q=75 3840w"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FblackLebron.5e8db3ca.webp&amp;w=3840&amp;q=75"
                                    style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"><a
                                    class="absolute inset-0" href="/products/blackLebron"></a></div>
                            <div class="ml-4 flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="flex justify-between ">
                                        <div>
                                            <h3 class="font-medium md:text-2xl "><a href="/products/blackLebron">Lebron
                                                    Black</a></h3><span class="my-1 text-sm text-neutral-500">Men's
                                                shoes</span>
                                            <div class="flex items-center gap-1"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                                    class="text-yellow-400" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path
                                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                                    </path>
                                                </svg><span class="text-sm">4.8</span></div>
                                        </div><span class="font-medium md:text-xl">$199</span>
                                    </div>
                                </div>
                                <div class="flex w-full items-end justify-between text-sm">
                                    <div class="flex items-center gap-3"><button type="button"
                                            class="flex h-9 w-9 items-center justify-center rounded-full bg-white "><svg
                                                class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                    stroke="currentColor" fill="none" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></button><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 1024 1024" class="text-2xl" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z">
                                            </path>
                                        </svg></div>
                                    <div>
                                        <div class="nc-InputNumber flex items-center justify-between space-x-5 w-full">
                                            <div
                                                class="nc-NcInputNumber__content flex w-[104px] items-center justify-between sm:w-28">
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-300 bg-white text-xl hover:border-neutral-700 focus:outline-none disabled:cursor-default disabled:opacity-50 disabled:hover:border-neutral-400"
                                                    type="button" disabled="">-</button><span
                                                    class="block flex-1 select-none text-center leading-none">1</span><button
                                                    class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-300 bg-white text-xl hover:border-neutral-700 focus:outline-none disabled:cursor-default disabled:opacity-50 disabled:hover:border-neutral-400"
                                                    type="button">+</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex py-5 last:pb-0">
                            <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-xl md:h-40 md:w-40"><img
                                    alt="SB Low Brown" loading="lazy" decoding="async" data-nimg="fill"
                                    class="h-full w-full object-contain object-center" sizes="100vw"
                                    srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=3840&amp;q=75 3840w"
                                    src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbrownsb.2a8c3289.webp&amp;w=3840&amp;q=75"
                                    style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"><a
                                    class="absolute inset-0" href="/products/brownsb"></a></div>
                            <div class="ml-4 flex flex-1 flex-col justify-between">
                                <div>
                                    <div class="flex justify-between ">
                                        <div>
                                            <h3 class="font-medium md:text-2xl "><a href="/products/brownsb">SB Low
                                                    Brown</a></h3><span class="my-1 text-sm text-neutral-500">Men's
                                                shoes</span>
                                            <div class="flex items-center gap-1"><svg stroke="currentColor"
                                                    fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                                    class="text-yellow-400" height="1em" width="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path
                                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                                    </path>
                                                </svg><span class="text-sm">4.8</span></div>
                                        </div><span class="font-medium md:text-xl">$199</span>
                                    </div>
                                </div>
                                <div class="flex w-full items-end justify-between text-sm">
                                    <div class="flex items-center gap-3"><button type="button"
                                            class="flex h-9 w-9 items-center justify-center rounded-full bg-white "><svg
                                                class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                    stroke="#e94e07" fill="#e94e07" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></button><svg stroke="currentColor" fill="currentColor"
                                            stroke-width="0" viewBox="0 0 1024 1024" class="text-2xl" height="1em"
                                            width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z">
                                            </path>
                                        </svg></div>
                                    <div>
                                        <div class="nc-InputNumber flex items-center justify-between space-x-5 w-full">
                                            <div
                                                class="nc-NcInputNumber__content flex w-[104px] items-center justify-between sm:w-28">
                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-300 bg-white text-xl hover:border-neutral-700 focus:outline-none disabled:cursor-default disabled:opacity-50 disabled:hover:border-neutral-400"
                                                    type="button" disabled="">-</button><span
                                                    class="block flex-1 select-none text-center leading-none">1</span><button
                                                    class="flex h-8 w-8 items-center justify-center rounded-full border border-neutral-300 bg-white text-xl hover:border-neutral-700 focus:outline-none disabled:cursor-default disabled:opacity-50 disabled:hover:border-neutral-400"
                                                    type="button">+</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 border-t border-neutral-300 pt-6 text-sm">
                        <div>
                            <div class="text-sm">Discount code</div>
                            <div class="mt-1.5 flex"><input
                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-12 px-4 py-3 flex-1 border-neutral-300 bg-transparent placeholder:text-neutral-500 focus:border-primary"
                                    type="text"><button type="button"
                                    class="ml-3 flex w-24 items-center justify-center rounded-2xl border border-neutral-300 bg-gray px-4 text-sm font-medium transition-colors hover:bg-neutral-100">Apply</button>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between pb-4"><span>Subtotal</span><span
                                class="font-semibold">$249.00</span></div>
                        <div class="flex justify-between py-4"><span>Estimated Delivery &amp; Handling</span><span
                                class="font-semibold">Free</span></div>
                        <div class="flex justify-between py-4"><span>Estimated taxes</span><span
                                class="font-semibold">$24.90</span></div>
                        <div class="flex justify-between pt-4 text-base font-semibold">
                            <span>Total</span><span>$276.00</span></div>
                    </div><button
                        class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 mt-8 w-full">Confirm
                        order</button>
                </div>
            </div>
        </main>
    </div>
@endsection
