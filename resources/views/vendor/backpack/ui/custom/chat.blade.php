@extends(backpack_view('blank'))
@section('content')
    {{-- <div class="relative">
        <div class="flex overflow-hidden w-full">
            <div class="w-1/4 bg-white border-r border-gray-300">
                <div class="overflow-y-auto h-screen p-3 mb-9 pb-20">
                    @foreach ($users as $item)
                        <div class="flex items-center mb-4 cursor-pointer hover:bg-gray-100 p-2 rounded-md">
                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                                <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato"
                                    alt="User Avatar" class="w-12 h-12 rounded-full">
                            </div>
                            <div class="flex-1">
                                <h2 class="text-lg font-semibold">{{ $item->name }}</h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex-1">
                <header class="bg-white p-4 text-gray-700">
                    <h1 class="text-2xl font-semibold">Alice</h1>
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
                        <input type="text" placeholder="Type a message..."
                            class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500">
                        <button class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                    </div>
                </footer>
            </div>
        </div>
    </div> --}}
    @livewire('chat-admin')
@endsection

@section('after_styles')
    <script src="{{ asset('js/tailwindcss.js') }}"></script>
    <script src="{{ asset('js/tailwind.config.js') }}"></script>
    @livewireStyles
@endsection

@section('after_scripts')
    @livewireScripts
    <script>
        // const chatId = document.querySelector('meta[name="chat-id"]').getAttribute('content');

        // Pusher.logToConsole = true;

        // var pusher = new Pusher('d6f74e9b3067a24fb319', {
        //     cluster: 'ap1'
        // });
        // var channel = pusher.subscribe(chatId);

        // channel.bind('chat', function(data) {
        //     var newLi = $(
        //         `<li class="in"><div class="chat-img"><img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar1.png"></div><div class="chat-body"><div class="chat-message"><h5 class="capitalize">Admin</h5><p>${data.message}</p></div></div></li>`
        //     );
        //     chatList.append(newLi);
        // });

        // document
        //     .querySelector("#form-chat")
        //     .addEventListener("submit", function(event) {
        //         event.preventDefault();

        //         const message = messageE.value;

        //         fetch(`/chat/broadcast`, {
        //                 method: 'POST',
        //                 headers: {
        //                     'Content-Type': 'application/json',
        //                     'X-CSRF-TOKEN': csrf,
        //                     'Authorization': `Bearer ${token}`
        //                 },
        //                 body: JSON.stringify({
        //                     message,
        //                     chatId
        //                 })
        //             })
        //             .then(response => response.json())
        //             .then(mgs => {

        //                 const newLi = document.createElement('li');
        //                 newLi.classList.add('out');

        //                 newLi.innerHTML = `
    // 			<div class="chat-img">
    // 					<img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar6.png">
    // 			</div>
    // 			<div class="chat-body">
    // 					<div class="chat-message">
    // 							<h5 class="capitalize">Bạn</h5>
    // 							<p>${mgs}</p>
    // 					</div></div>`;

        //                 chatList.appendChild(newLi);
        //             })
        //         messageE.value = "";
        //     });
    </script>
@endsection
