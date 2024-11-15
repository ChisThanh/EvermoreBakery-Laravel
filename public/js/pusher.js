
const metaChatId = document.querySelector('meta[name="chat-id"]');
var chatId = metaChatId.getAttribute('content');
const token = document.querySelector('meta[name="api-token"]').getAttribute('content');
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const messageE = document.querySelector("#form-chat #message");
const chatList = document.querySelector('.chat-list');
let tmp = '';

var pusher = new Pusher('d6f74e9b3067a24fb319', { cluster: 'ap1' });
var channel = pusher.subscribe(chatId);

channel.bind('pusher:subscription_succeeded', function (data) {
	console.log('Subscription succeeded!', data);
});

channel.bind('chat', function (data) {
	if (data.message === tmp) return;
	addBotMessage(data.message);
});

function sendMsg(userMessage) {
	fetch(`api/v1/chat`, {
		method: 'POST',
		headers: {
			'Accept': 'application/json',
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': csrf,
			'Authorization': `Bearer ${token}`
		},
		body: JSON.stringify({ message: userMessage, channel: chatId })
	})
		.then(response => response.json())
		.then(data => {
			if (data.status_code === 200) {
				tmp = userMessage;
				addUserMessage(userMessage);

				if (data.data.answer) {
					setTimeout(() => {
						addBotMessage(data.data.answer);
					}, 500);
				}

			}
		})
}
document.addEventListener('DOMContentLoaded', () => {

	if (chatId === '') {
		chatId = generateRandomString(20);
		metaChatId.setAttribute('content', chatId);
	}

	sendButton.addEventListener("click", function () {
		const userMessage = userInput.value;
		if (userMessage.trim() !== "") {
			sendMsg(userMessage);
			userInput.value = "";
		}
	});

	userInput.addEventListener("keyup", function (event) {
		if (event.key === "Enter") {
			const userMessage = userInput.value;
			sendMsg(userMessage);
			userInput.value = "";
		}
	});
});
