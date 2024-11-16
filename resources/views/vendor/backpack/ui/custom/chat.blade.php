@extends(backpack_view('blank'))
@section('content')
    <div class="relative">
        @livewire('chat-admin')
        <footer wire:ignore class="bg-white border-t border-gray-300 p-4 absolute bottom-0 right-0 w-3/4">
            <div class="flex items-center">
                <input type="text" placeholder="Nhập tin nhắn..." id="userInput"
                    class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500">
                <button class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2" id="sendButton">Gửi</button>
            </div>
        </footer>
    </div>
@endsection

@section('after_styles')
    <script src="{{ asset('js/tailwindcss.js') }}"></script>
    <script src="{{ asset('js/tailwind.config.js') }}"></script>
    @livewireStyles
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@endsection

@section('after_scripts')
    @livewireScripts
    <script>
        let _tmp = "";
        document.addEventListener('DOMContentLoaded', function() {
            const sendButton = document.querySelector("#sendButton");
            const userInput = document.querySelector("#userInput");
            var chatId = document.querySelector('#chat-id').value;
            var chatList = document.querySelector('#chat-list');
            var pusher = new Pusher('d6f74e9b3067a24fb319', {
                cluster: 'ap1'
            });
            var channel = pusher.subscribe(chatId);
            channel.bind('pusher:subscription_succeeded', function(data) {
                console.log('Subscription succeeded!', data);
            });

            channel.bind('chat', function(data) {
                if (data.message.trim() == _tmp.trim()) return;
                
                addSenderMessage(data.message);

                if (data.bot_message && data.bot_message !== "NULL")
                    addUserMessage(data.bot_message);
            });

            sendButton.addEventListener("click", function() {


                const userMessage = userInput.value;
                _tmp = userMessage;
                if (userMessage.trim() !== "") {
                    sendMsg(userMessage);
                    userInput.value = "";
                }
            });

            userInput.addEventListener("keyup", function(event) {
                if (event.key === "Enter") {
                    const userMessage = userInput.value;
                    _tmp = userMessage;
                    if (userMessage.trim() !== "") {
                        sendMsg(userMessage);
                        userInput.value = "";
                    }
                }
            });

            function setListeners() {
                if (chatId !== document.querySelector('#chat-id').value) {
                    chatId = document.querySelector('#chat-id').value;
                    channel = pusher.subscribe(chatId);
                    channel.bind('pusher:subscription_succeeded', function(data) {
                        console.log('Subscription succeeded!', data);
                    });
                    channel.bind('chat', function(data) {
                        if (data.message.trim() == _tmp.trim()) return;
                        addSenderMessage(data.message);
                    });
                    chatList = document.querySelector('#chat-list');
                }
            }

            function addUserMessage(message) {
                const messageElement = document.createElement("div");
                messageElement.classList.add("mb-2", "text-right");
                messageElement.innerHTML =
                    `<div class="flex justify-end mb-4 cursor-pointer">
                <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                    <p>${message}</p>
                </div>
                <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                    <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato"
                        alt="My Avatar" class="w-8 h-8 rounded-full">
                </div>
            </div>`;
                chatList.appendChild(messageElement);
                chatList.scrollTop = chatList.scrollHeight;
            }

            function addSenderMessage(message) {
                const messageElement = document.createElement("div");
                messageElement.classList.add("mb-2");
                messageElement.innerHTML =
                    `<div class="flex mb-4 cursor-pointer">
                <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                    <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato"
                        alt="User Avatar" class="w-8 h-8 rounded-full">
                </div>
                <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                    <p class="text-gray-700">${message}</p>
                </div>
            </div>`;
                chatList.appendChild(messageElement);
                chatList.scrollTop = chatList.scrollHeight;
            }

            function sendMsg(message) {
                setListeners();
                _tmp = message;
                fetch("/admin/chat/broadcast", {
                        method: "POST",
                        headers: {
                            'Accept': 'application/json',
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            message: message,
                            channel: chatId,
                            admin: true
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        addUserMessage(data.data.message);
                    });
            }
        });
    </script>
@endsection
