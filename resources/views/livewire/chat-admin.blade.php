<div class="relative">
    <div class="flex overflow-hidden w-full">
        <div class="w-1/4 bg-white border-r border-gray-300">
            <div class="overflow-y-auto h-screen p-3 mb-9 pb-20">
                @foreach ($users as $item)
                    <div class="flex items-center mb-4 cursor-pointer hover:bg-gray-100 p-2 rounded-md"
                        wire:click="selectUser({{ $item->id }}, {{ $item }})">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                            <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato"
                                alt="User Avatar" class="w-12 h-12 rounded-full">
                        </div>
                        <div class="flex-1">
                            <h2 class="text-lg font-semibold">{{ $item->name }}</h2>
                        </div>
                        @if ($selectedUserId == $item->id)
                            <span class="text-blue-500">Selected</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex-1">
            <header class="bg-white p-4 text-gray-700">
                <h1 class="text-2xl font-semibold">
                    {{ $selectedUserId ? $selectedUser['name'] : 'Chọn người dùng' }}</h1>
            </header>
            <div class="h-screen overflow-y-auto p-4 pb-36 border-end-1">
                <div class="flex mb-4 cursor-pointer">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                        <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar"
                            class="w-8 h-8 rounded-full">
                    </div>
                    <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                        <p class="text-gray-700">Hey Bob, how's it going?</p>
                    </div>
                </div>
                <div class="flex justify-end mb-4 cursor-pointer">
                    <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                        <p>Hi Alice! I'm good, just finished a great book. How about you?</p>
                    </div>
                    <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                        <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="My Avatar"
                            class="w-8 h-8 rounded-full">
                    </div>
                </div>
            </div>
            <footer class="bg-white border-t border-gray-300 p-4 absolute bottom-0 w-3/4">
                <div class="flex items-center">
                    <input type="text" placeholder="Nhập tin nhắn..."
                        class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500">
                    <button class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Gửi</button>
                </div>
            </footer>
        </div>
    </div>
</div>
