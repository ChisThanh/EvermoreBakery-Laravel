@extends(backpack_view('blank'))
@section('content')
    @livewire('chat-admin')
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
        document.addEventListener('DOMContentLoaded', () => {
            const sendButton = document.querySelector("#sendButton");
            const userInput = document.querySelector("#userInput");
            const chatId = document.querySelector('#chat-id').value;
            const chatList = document.querySelector('#chat-list');
            var tmp = '';
            var pusher = new Pusher('d6f74e9b3067a24fb319', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe(chatId);
            channel.bind('pusher:subscription_succeeded', function(data) {
                console.log('Subscription succeeded!', data);
            });

            channel.bind('chat', function(data) {
                if (data.message === tmp) return;
                addSenderMessage(data.message);
            });

            sendButton.addEventListener("click", function() {
                const userMessage = userInput.value;
                if (userMessage.trim() !== "") {
                    sendMsg(userMessage);
                    userInput.value = "";
                }
            });

            userInput.addEventListener("keyup", function(event) {
                if (event.key === "Enter") {
                    const userMessage = userInput.value;
                    sendMsg(userMessage);
                    userInput.value = "";
                }
            });

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
                tmp = message;
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
