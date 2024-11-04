@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="mb-32 mt-20">
            <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-10">
                <div class="mx-auto mb-2 w-full max-w-3xl text-center">
                    <h2 class="lineHeight text-3xl lg:text-[55px] mb-5 font-medium" style="line-height: 1.2em;">Contact us
                    </h2>
                    <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis quis
                        phasellus eleifend tellus orci ornare.</p>
                </div>
            </div>
            <div class="mx-auto max-w-3xl rounded-3xl bg-gray p-5 md:p-10 lg:p-16">
                <div class="w-full space-y-5">
                    <div class="grid gap-5 md:grid-cols-2">
                        <div class="">
                            <div class="font-medium">Name</div>
                            <div class="mt-1.5"><input
                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-14 px-4 py-5 border-neutral-300 bg-white placeholder:text-neutral-500 focus:border-primary"
                                    placeholder="Full name" type="text"></div>
                        </div>
                        <div class="">
                            <div class="font-medium">Email Address</div>
                            <div class="mt-1.5"><input
                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-14 px-4 py-5 border-neutral-300 bg-white placeholder:text-neutral-500 focus:border-primary"
                                    placeholder="example@email.com" type="email"></div>
                        </div>
                    </div>
                    <div class="grid gap-5 md:grid-cols-2">
                        <div class="">
                            <div class="font-medium">Phone Number</div>
                            <div class="mt-1.5"><input
                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-14 px-4 py-5 border-neutral-300 bg-white placeholder:text-neutral-500 focus:border-primary"
                                    placeholder="(123) 456-7890" type="text"></div>
                        </div>
                        <div class="">
                            <div class="font-medium">Subject</div>
                            <div class="mt-1.5"><input
                                    class="block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-lg text-sm font-normal h-14 px-4 py-5 border-neutral-300 bg-white placeholder:text-neutral-500 focus:border-primary"
                                    placeholder="Shoe care" type="text"></div>
                        </div>
                    </div>
                    <div class="">
                        <div class="font-medium">Message</div>
                        <div class="mt-1.5">
                            <textarea
                                class="block w-full rounded-lg focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 border border-neutral-300 bg-white p-4 placeholder:text-neutral-500 focus:border-primary"
                                rows="6" placeholder="Enter your message here!"></textarea>
                        </div>
                    </div><button
                        class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-4 px-6  rounded-full bg-primary text-white hover:bg-primary/80 disabled:bg-opacity-70 self-center">Submit</button>
                </div>
            </div>
        </div>
        <div class="mb-32">
            <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-10">
                <div class="mx-auto mb-2 w-full max-w-3xl text-center">
                    <h2 class="lineHeight text-3xl lg:text-[55px] mb-5 font-medium" style="line-height: 1.2em;">Prefer to
                        reach out directly?</h2>
                    <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh magna sit
                        diam pharetra.</p>
                </div>
            </div>
            <div class="grid gap-10 lg:grid-cols-3">
                <div class="flex flex-col items-center justify-center gap-7"><button type="button"
                        class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray text-primary w-24 h-24 "><svg
                            stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                            stroke-linejoin="round" class="text-5xl" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg></button>
                    <h2 class="text-2xl font-medium">Sales</h2>
                    <p class="text-center text-neutral-500">Lorem ipsum dolor sit amet consectetur adipiscing elit blandit
                        velit semper aliquam.</p><a
                        class="border-b border-black py-2 text-2xl font-medium hover:border-primary hover:text-primary"
                        href="mailto:sales@hotkicks.com">sales@hotkicks.com</a>
                </div>
                <div class="flex flex-col items-center justify-center gap-7"><button type="button"
                        class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray text-primary w-24 h-24 "><svg
                            stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            class="text-5xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke-linejoin="round" stroke-width="32"
                                d="M408 64H104a56.16 56.16 0 00-56 56v192a56.16 56.16 0 0056 56h40v80l93.72-78.14a8 8 0 015.13-1.86H408a56.16 56.16 0 0056-56V120a56.16 56.16 0 00-56-56z">
                            </path>
                        </svg></button>
                    <h2 class="text-2xl font-medium">Support</h2>
                    <p class="text-center text-neutral-500">Lorem ipsum dolor sit amet consectetur adipiscing elit blandit
                        velit semper aliquam.</p><a
                        class="border-b border-black py-2 text-2xl font-medium hover:border-primary hover:text-primary"
                        href="mailto:support@hotckicks.com">support@hotckicks.com</a>
                </div>
                <div class="flex flex-col items-center justify-center gap-7"><button type="button"
                        class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none focus:ring-transparent disabled:bg-opacity-70 bg-gray text-primary w-24 h-24 "><svg
                            stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-5xl"
                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                            <path
                                d="M20 4h-3.17L15 2H9L7.17 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V6h4.05l1.83-2h4.24l1.83 2H20v12zM12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z">
                            </path>
                        </svg></button>
                    <h2 class="text-2xl font-medium">Influencers</h2>
                    <p class="text-center text-neutral-500">Lorem ipsum dolor sit amet consectetur adipiscing elit blandit
                        velit semper aliquam.</p><a
                        class="border-b border-black py-2 text-2xl font-medium hover:border-primary hover:text-primary"
                        href="mailto:influencers@hotckicks.com">influencers@hotckicks.com</a>
                </div>
            </div>
        </div>
        <div class="mb-32">
            <div class="mb-10 flex items-center justify-between">
                <h2 class="text-3xl font-semibold">Follow us on Instagram</h2><button
                    class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium py-3 px-4 sm:py-3.5 sm:px-6  border-2 border-primary text-primary">Visit</button>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <div class="grid grid-cols-2 gap-5">
                    <div><img alt="instagram photo" loading="lazy" width="1000" height="1000" decoding="async"
                            data-nimg="1" class="h-full w-full object-cover object-center"
                            srcset="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1595341888016-a392ef81b7de%3Fq%3D80%26w%3D1479%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=1080&amp;q=75 1x, /_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1595341888016-a392ef81b7de%3Fq%3D80%26w%3D1479%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75 2x"
                            src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1595341888016-a392ef81b7de%3Fq%3D80%26w%3D1479%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                            style="color: transparent;"></div>
                    <div><img alt="instagram photo" loading="lazy" width="1000" height="1000" decoding="async"
                            data-nimg="1" class="h-full w-full object-cover object-center"
                            srcset="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1463100099107-aa0980c362e6%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=1080&amp;q=75 1x, /_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1463100099107-aa0980c362e6%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75 2x"
                            src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1463100099107-aa0980c362e6%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                            style="color: transparent;"></div>
                    <div><img alt="instagram photo" loading="lazy" width="1000" height="1000" decoding="async"
                            data-nimg="1" class="h-full w-full object-cover object-center"
                            srcset="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1511556532299-8f662fc26c06%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=1080&amp;q=75 1x, /_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1511556532299-8f662fc26c06%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75 2x"
                            src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1511556532299-8f662fc26c06%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                            style="color: transparent;"></div>
                    <div><img alt="instagram photo" loading="lazy" width="1000" height="1000" decoding="async"
                            data-nimg="1" class="h-full w-full object-cover object-center"
                            srcset="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1505784045224-1247b2b29cf3%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=1080&amp;q=75 1x, /_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1505784045224-1247b2b29cf3%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75 2x"
                            src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1505784045224-1247b2b29cf3%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                            style="color: transparent;"></div>
                </div>
                <div><img alt="instagram photo" loading="lazy" width="1000" height="1000" decoding="async"
                        data-nimg="1" class="h-full w-full object-cover object-center"
                        srcset="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1604671801908-6f0c6a092c05%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=1080&amp;q=75 1x, /_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1604671801908-6f0c6a092c05%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75 2x"
                        src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1604671801908-6f0c6a092c05%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                        style="color: transparent;"></div>
            </div>
        </div>
    </div>
@endsection
