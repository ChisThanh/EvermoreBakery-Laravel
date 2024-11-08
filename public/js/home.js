const swiper = new Swiper('.swiper-home', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 'auto',
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    }
});

function countdown() {
    const countdownElement = document.getElementById('countdown');
    const dataSecond = countdownElement.getAttribute('data-second');
    const seconds = parseInt(dataSecond, 10);

    let remainingTime = seconds;
    let lastUpdate = Date.now();

    const updateCountdown = () => {
        const now = Date.now();
        const delta = (now - lastUpdate) / 1000;

        if (remainingTime <= 0) {
            return;
        }

        remainingTime -= delta;
        if (remainingTime < 0) remainingTime = 0;

        const hours = Math.floor(remainingTime / 3600);
        const minutes = Math.floor((remainingTime % 3600) / 60);
        const secondsLeft = Math.ceil(remainingTime % 60);

        countdownElement.textContent =
            String(hours).padStart(2, '0') + ':' +
            String(minutes).padStart(2, '0') + ':' +
            String(secondsLeft).padStart(2, '0');

        lastUpdate = now;
        requestAnimationFrame(updateCountdown);
    };

    updateCountdown();
}

document.addEventListener('DOMContentLoaded', () => {
    countdown();
});