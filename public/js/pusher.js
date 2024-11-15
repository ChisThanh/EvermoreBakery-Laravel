const chatId = document.querySelector('meta[name="chat-id"]').getAttribute('content');
const token = document.querySelector('meta[name="api-token"]').getAttribute('content');
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const messageE = document.querySelector("#form-chat #message");
const chatList = document.querySelector('.chat-list');

Pusher.logToConsole = true;

var pusher = new Pusher('d6f74e9b3067a24fb319', { cluster: 'ap1' });
var channel = pusher.subscribe(chatId);

channel.bind('chat', function (data) {
	var newLi = $(
		`<li class="in"><div class="chat-img"><img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar1.png"></div><div class="chat-body"><div class="chat-message"><h5 class="capitalize">Admin</h5><p>${data.message}</p></div></div></li>`
	);
	chatList.append(newLi);
});

document
	.querySelector("#form-chat")
	.addEventListener("submit", function (event) {
		event.preventDefault();

		const message = messageE.value;

		fetch(`/chat/broadcast`, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': csrf,
				'Authorization': `Bearer ${token}`
			},
			body: JSON.stringify({ message, chatId })
		})
			.then(response => response.json())
			.then(mgs => {

				const newLi = document.createElement('li');
				newLi.classList.add('out');

				newLi.innerHTML = `
					<div class="chat-img">
							<img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar6.png">
					</div>
					<div class="chat-body">
							<div class="chat-message">
									<h5 class="capitalize">Bạn</h5>
									<p>${mgs}</p>
							</div></div>`;

				chatList.appendChild(newLi);
			})
		messageE.value = "";
	});
