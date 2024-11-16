<div class="flex overflow-hidden w-full">
    <div class="w-1/4 bg-white border-r border-gray-300">
        <div class="overflow-y-auto h-screen p-3 mb-9 pb-20">
            @foreach ($users as $item)
                <div class="flex items-center mb-4 cursor-pointer hover:bg-gray-100 p-2 rounded-md"
                    wire:click="selectUser({{ $item }})">
                    <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                        <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar"
                            class="w-12 h-12 rounded-full">
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold">{{ $item->name }}</h2>
                    </div>
                </div>
            @endforeach
            <input type="hidden" id="chat-id" value="{{ $selectedUser['chat_id'] ?? '' }}">
            <input type="hidden" id="user-id" value="{{ $selectedUser['id'] ?? '' }}">
        </div>
    </div>
    <div class="flex-1">
        <header class="bg-white p-4 text-gray-700 d-flex items-center justify-between">
            <h1 class="text-2xl font-semibold">
                {{ $selectedUser ? $selectedUser['name'] : 'Chọn người dùng' }}</h1>

            @isset($selectedUser)
                <button type="button" wire:click="toggleChatbot({{ $selectedUser['id'] }})"
                    class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">
                    {{ $selectedUser['is_chatbot'] == 1 ? 'Tắt ChatBot' : 'Bật ChatBot' }}
                </button>
            @endisset


        </header>
        <div class="h-screen overflow-y-auto px-4 pb-36 border-end-1 " id="chat-list">
            @foreach ($history as $item)
                @if ($item->is_customer == true)
                    <div class="flex mb-4 cursor-pointer">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                            <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato"
                                alt="User Avatar" class="w-8 h-8 rounded-full">
                        </div>
                        <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                            <p class="text-gray-700">{{ $item->message }}</p>
                        </div>
                    </div>
                @else
                    <div class="flex justify-end mb-4 cursor-pointer">
                        <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                            <p>{{ $item->message }}</p>
                        </div>
                        <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                            <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato"
                                alt="My Avatar" class="w-8 h-8 rounded-full">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
