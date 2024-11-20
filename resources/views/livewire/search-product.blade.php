<div class="mb-5">
    <div wire:loading>
        <div class="fixed inset-0 flex items-center justify-center bg-white min-h-screen z-[100000000]">
            <div class="loader">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>
    </div>
    <div wire:loading.remove>
        <div class="container relative flex flex-col lg:flex-row" id="body">
            <div class="pr-4 pt-10 lg:basis-1/3 xl:basis-1/4">
                <div class="top-28 lg:sticky">
                    <div
                        class="nc-Section-Heading relative flex flex-col justify-between sm:flex-row sm:items-end mb-0">
                        <div class="max-w-4xl">
                            <h2 class="text-3xl mb-5 font-medium" style="line-height: 1.2em;">Lọc Sản Phẩm</h2>
                        </div>
                    </div>
                    <div class="divide-y divide-neutral-300">
                        <div class="relative flex flex-col space-y-4 pb-8">
                            <h3 class="mb-2.5 text-xl font-medium">Thể Loại</h3>
                            <div class="grid gap-4">
                                <button type="button" wire:click="setCategory(null)"
                                    class="rounded-lg py-2  @if ($categoryName != null || $categoryName != '') bg-gray @else bg-primary text-white @endif">Tất
                                    cả</button>
                                @foreach ($categories as $category)
                                    <button type="button"
                                        class="rounded-lg py-2 bg-gray @if ($category->name == $categoryName) bg-primary text-white @endif"
                                        wire:click="setCategory('{{ $category->name }}')">{{ $category->name }}</button>
                                @endforeach
                            </div>
                        </div>
                        <div class="relative flex flex-col space-y-5 py-8 pr-3">
                            <div class="space-y-5"><span class="font-semibold">Theo Giá</span>
                                <div class="grid gap-4">
                                    <button type="button"
                                        class="rounded-lg py-2 @if ($price != null || $price != '') bg-gray @else bg-primary text-white @endif"
                                        wire:click="setPrice(null)">Tất Cả</button>
                                    <button type="button"
                                        class="rounded-lg py-2 bg-gray @if ($price == 'asc') bg-primary text-white @endif"
                                        wire:click="setPrice('asc')">Thấp Đến Cao</button>
                                    <button type="button"
                                        class="rounded-lg py-2 bg-gray @if ($price == 'desc') bg-primary text-white @endif"
                                        wire:click="setPrice('desc')">Cao Đến Thấp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-10 shrink-0 border-t lg:mx-4 lg:mb-0 lg:border-t-0"></div>
            <div class="relative flex-1">
                <div
                    class="top-32 z-10 mb-3 items-center gap-5 space-y-5 bg-white py-10 lg:sticky lg:flex lg:space-y-0">
                    <div class="flex flex-1 items-center gap-2 rounded-full border border-neutral-300 px-4">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            class="text-2xl text-neutral-500" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                            </path>
                        </svg>
                        <form wire:submit.prevent="searchSubmit" class="block w-full">
                            <input wire:model.defer="search" id="js-search-product"
                                class=" block w-full focus:ring focus:ring-transparent focus:ring-opacity-25 disabled:bg-neutral-800 rounded-full text-sm font-normal h-12 px-4 py-3 border-transparent bg-transparent placeholder:text-neutral-500 focus:border-transparent"
                                placeholder="Search..." type="text" oninput="debouncedSearch(this)"
                                autocomplete="off">
                        </form>
                    </div>
                    <button type="submit" wire:click="searchSubmit"
                        class="ml-2 bg-primary text-white rounded-full h-12 px-6 py-3">
                        Tìm Kiếm
                    </button>
                </div>
                <div class="grid flex-1 gap-x-8 gap-y-10 sm:grid-cols-2 xl:grid-cols-3 ">
                    @foreach ($products as $each)
                        <div class="transitionEffect relative rounded-2xl p-3 shadow-md undefined">
                            <div class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                                @php $event = $each->events->first(); @endphp
                                @if ($event)
                                    <div
                                        class="absolute left-6 top-0 rounded-b-lg bg-primary px-3 py-2 text-sm uppercase text-white shadow-md">
                                        {{ (int) $event->pivot->percentage }}%
                                    </div>
                                @endif
                                <button type="button" onclick="likeProduct('{{ $each['slug'] }}', this)"
                                    data-liked="{{ $each['liked'] }}"
                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-white absolute right-2 top-2 border-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                                        @if ($each['liked'])
                                            <path
                                                d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                stroke="currentColor" fill="#e94e07" stroke-width="0"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        @else
                                            <path
                                                d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                                                stroke="currentColor" fill="none" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        @endif
                                    </svg>
                                </button>
                                <a class="h-[250px] w-full lg:h-[220px]" href="/products/{{ $each['slug'] }}">
                                    <img alt="Air Force 1 cover photo" loading="lazy" width="592" height="592"
                                        decoding="async" data-nimg="1" class="h-full w-full object-cover object-bottom"
                                        src="storage/{{ $each['image'] }}" style="color: transparent;">
                                </a>
                            </div>
                            <div class="mt-3">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-semibold">{{ $each['name'] }}</h3>
                                    <p class="text-neutral-500 block text-sm line-through">@if($each['price'] != $each['price_sale']) {{ $each['price'] }} Đ @endif</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-neutral-500">{{ $each['category_name'] }}</p>
                                    <p class="text-lg font-medium text-primary">{{ $each['price_sale'] }} Đ</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 text-gray-700">
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
