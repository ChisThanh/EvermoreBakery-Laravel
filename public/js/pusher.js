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

document.addEventListener('DOMContentLoaded', () => {

	const chatbox = document.getElementById("chatbox");
	const chatContainer = document.getElementById("chat-container");
	const userInput = document.getElementById("user-input");
	const sendButton = document.getElementById("send-button");
	const openChatButton = document.getElementById("open-chat");
	const closeChatButton = document.getElementById("close-chat");

	function toggleChatbox() {
		chatContainer.classList.toggle("hidden");
	}

	channel.bind('chat', function (data) {
		if (data.message.trim() === tmp.trim()) return;
		addBotMessage(data.message);
	});

	openChatButton.addEventListener("click", toggleChatbox);

	closeChatButton.addEventListener("click", toggleChatbox);

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

	if (chatId === '') {
		chatId = generateRandomString(10);
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

	function getHistory() {
		fetch(`/api/v1/chat/${chatId}`, {
			method: 'GET',
			headers: {
				'Accept': 'application/json',
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': csrf,
				'Authorization': `Bearer ${token}`
			}
		})
			.then(response => response.json())
			.then(data => {
				if (data.status_code === 404) {
					addBotMessage('Xin chào, tôi có thể giúp gì được cho bạn');
				}
				if (data.status_code === 200) {
					addBotMessage('Xin chào, tôi có thể giúp gì được cho bạn');
					data.data.forEach(element => {
						if (element.is_customer === '0') {
							addBotMessage(element.message);
						} else {
							addUserMessage(element.message);
						}
					});
				}
			})
	}
	getHistory();

	function addUserMessage(message) {
		const messageElement = document.createElement("div");
		messageElement.classList.add("mb-2", "text-right");
		messageElement.innerHTML =
			`<p class="bg-primary text-secondary rounded-lg py-2 px-4 inline-block">${message}</p>`;
		chatbox.appendChild(messageElement);
		chatbox.scrollTop = chatbox.scrollHeight;
	}

	function addBotMessage(message) {
		const messageElement = document.createElement("div");
		messageElement.classList.add("mb-2");
		messageElement.innerHTML =
			`<p class="bg-gray-200 text-white rounded-lg py-2 px-4 inline-block">${message}</p>`;
		chatbox.appendChild(messageElement);
		chatbox.scrollTop = chatbox.scrollHeight;
	}
});
