@extends('layouts.main')
@section('content')
    <div class="container pb-20 pt-10">
        <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-10">
            <div class="max-w-4xl">
                <h2 class="lineHeight text-3xl lg:text-[55px] mb-5 font-medium" style="line-height: 1.2em;">Blog Posts</h2>
                <p class="mt-5 text-neutral-500">Cras imperdiet vel id quis ut mattis ut id et viverra velit ut nam amet
                    massa cursus tempor nibh pellentesque risus accumsan luc incidunt.</p>
            </div>
        </div>
        <div class="pb-24">
            <div class="grid gap-10 lg:grid-cols-3">
                <div class="space-y-10 lg:col-span-2"><a
                        href="/blog/the-evolution-of-sneaker-culture-a-historical-perspective"><img alt=""
                            loading="lazy" width="1000" height="1000" decoding="async" data-nimg="1"
                            class="w-full rounded-3xl"
                            src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1455849318743-b2233052fcff%3Fq%3D80%26w%3D1469%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                            style="color: transparent;"></a>
                    <div class="space-y-3">
                        <p class="border-b border-neutral-300 py-5 text-neutral-500">Style - October 2, 2022</p>
                        <h1 class="text-3xl font-semibold">The Evolution of Sneaker Culture: A Historical Perspective</h1>
                        <p class="text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur adipiscing elit,
                            sed do eiusmod tempor.</p>
                    </div>
                </div>
                <div>
                    <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-1 lg:gap-20"><a class="flex flex-col gap-3"
                            href="/blog/top-10-sneaker-trends-to-watch-in-2023">
                            <div class="overflow-hidden rounded-xl"><img alt="cover image" loading="lazy" width="1000"
                                    height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1448387473223-5c37445527e7%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="space-y-1"><span class="text-neutral-500">Fitting - October 2, 2022</span>
                                <h4 class="font-semibold">Top 10 Sneaker Trends to Watch in 2023</h4>
                            </div>
                        </a><a class="flex flex-col gap-3" href="/blog/how-to-clean-and-maintain-your-sneaker-collection">
                            <div class="overflow-hidden rounded-xl"><img alt="cover image" loading="lazy" width="1000"
                                    height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1469395446868-fb6a048d5ca3%3Fq%3D80%26w%3D1633%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                            <div class="space-y-1"><span class="text-neutral-500">Style - October 2, 2022</span>
                                <h4 class="font-semibold">How to Clean and Maintain Your Sneaker Collection</h4>
                            </div>
                        </a></div>
                </div>
            </div>
        </div>
        <div class="py-24">
            <div class="">
                <div class="mb-16 space-y-2">
                    <div class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-0">
                        <div class="mx-auto mb-2 w-full max-w-3xl text-center">
                            <h2 class="lineHeight text-3xl lg:text-[55px] mb-5 font-medium" style="line-height: 1.2em;">
                                Latest News</h2>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center justify-center gap-5"><button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-5 py-3  bg-primary text-white">All</button><button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-5 py-3  border-2 border-primary text-primary">Style</button><button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-5 py-3  border-2 border-primary text-primary">Fitting</button><button
                            class="relative h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm sm:text-base font-medium px-5 py-3  border-2 border-primary text-primary">General</button>
                    </div>
                </div>
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/the-evolution-of-sneaker-culture-a-historical-perspective">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1455849318743-b2233052fcff%3Fq%3D80%26w%3D1469%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - Style</p>
                            <h3 class="card-title text-2xl font-semibold">The Evolution of Sneaker Culture: A Historical
                                Perspective</h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/the-evolution-of-sneaker-culture-a-historical-perspective">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                            class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/top-10-sneaker-trends-to-watch-in-2023">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1448387473223-5c37445527e7%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - Fitting</p>
                            <h3 class="card-title text-2xl font-semibold">Top 10 Sneaker Trends to Watch in 2023</h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/top-10-sneaker-trends-to-watch-in-2023">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/how-to-clean-and-maintain-your-sneaker-collection">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1469395446868-fb6a048d5ca3%3Fq%3D80%26w%3D1633%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - Style</p>
                            <h3 class="card-title text-2xl font-semibold">How to Clean and Maintain Your Sneaker Collection
                            </h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/how-to-clean-and-maintain-your-sneaker-collection">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/the-influence-of-sneaker-collaborations-from-athletes-to-designers">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1659614404055-670edff49a1b%3Fq%3D80%26w%3D1374%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - General</p>
                            <h3 class="card-title text-2xl font-semibold">The Influence of Sneaker Collaborations: From
                                Athletes to Designers</h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/the-influence-of-sneaker-collaborations-from-athletes-to-designers">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/sneaker-sizing-guide-finding-the-perfect-fit">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1515396800500-75d7b90b3b94%3Fq%3D80%26w%3D1492%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - Style</p>
                            <h3 class="card-title text-2xl font-semibold">Sneaker Sizing Guide: Finding the Perfect Fit
                            </h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/sneaker-sizing-guide-finding-the-perfect-fit">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/sneaker-collecting-101-building-and-organizing-your-sneaker-collection">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1552346154-21d32810aba3%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - Fitting</p>
                            <h3 class="card-title text-2xl font-semibold">Sneaker Collecting 101: Building and Organizing
                                Your Sneaker Collection</h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/sneaker-collecting-101-building-and-organizing-your-sneaker-collection">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/behind-the-design-sneaker-production-process-unveiled">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1565814636199-ae8133055c1c%3Fq%3D80%26w%3D1480%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - General</p>
                            <h3 class="card-title text-2xl font-semibold">Behind the Design: Sneaker Production Process
                                Unveiled</h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/behind-the-design-sneaker-production-process-unveiled">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/exploring-limited-edition-sneaker-drops-how-to-cop-exclusive-releases">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1495555961986-6d4c1ecb7be3%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - General</p>
                            <h3 class="card-title text-2xl font-semibold">Exploring Limited Edition Sneaker Drops: How to
                                Cop Exclusive Releases</h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/exploring-limited-edition-sneaker-drops-how-to-cop-exclusive-releases">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/sneaker-spotlight-nike-review-and-styling-tips">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fphoto-1607522370275-f14206abe5d3%3Fq%3D80%26w%3D1421%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - Style</p>
                            <h3 class="card-title text-2xl font-semibold">Sneaker Spotlight: Nike Review and Styling Tips
                            </h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/sneaker-spotlight-nike-review-and-styling-tips">Read More<svg
                                            stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-[540px] space-y-5 overflow-hidden rounded-xl border border-neutral-300 p-3 shadow-md"
                        style="opacity: 1; transform: translateY(0%) translateZ(0px);"><a
                            href="/blog/sustainable-sneaker-choices-eco-friendly-options-in-the-market">
                            <div class="h-[220px] w-full overflow-hidden rounded-xl"><img alt="blog cover" loading="lazy"
                                    width="1000" height="1000" decoding="async" data-nimg="1"
                                    class="h-full w-full object-cover object-center"
                                    src="/_next/image?url=https%3A%2F%2Fimages.unsplash.com%2Fflagged%2Fphoto-1556637640-2c80d3201be8%3Fq%3D80%26w%3D1470%26auto%3Dformat%26fit%3Dcrop%26ixlib%3Drb-4.0.3%26ixid%3DM3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%253D%253D&amp;w=2048&amp;q=75"
                                    style="color: transparent;"></div>
                        </a>
                        <div class="">
                            <p class="text-neutral-500">October 2, 2022 - Style</p>
                            <h3 class="card-title text-2xl font-semibold">Sustainable Sneaker Choices: Eco-Friendly Options
                                in the Market</h3>
                            <p class="mt-5 text-neutral-500">Lorem ipsum dolor sit amet, lormol amenrtol consectetur
                                adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="absolute bottom-5 left-3 w-full">
                                <div class="relative"><a
                                        class="inline-flex items-center gap-2 border-b-2 border-primary py-1 font-medium text-primary"
                                        href="/blog/sustainable-sneaker-choices-eco-friendly-options-in-the-market">Read
                                        More<svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" class="text-2xl" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path>
                                        </svg></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
