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

document.addEventListener('DOMContentLoaded', () => {
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const token = document.querySelector('meta[name="api-token"]').getAttribute('content');
    const getRecommendProducts = async () => {
        fetch('/api/v1/recommend-products', {
            credentials: 'include',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': `Bearer ${token}`,
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.data.length > 0) {
                    const products = data.data;
                    products.forEach(product => {
                        const item = htmlItem(product);
                        document.getElementById('recommend-products').insertAdjacentHTML('beforeend', item);
                    });
                }
            });
    };

    const htmlItem = (product) => {
        return `
            <li class="swiper-slide relative inline-block shrink-0 whitespace-normal px-2"
                style="width: calc(25%); transform: translateX(0%) translateZ(0px);">
                <div
                    class="transitionEffect relative rounded-2xl p-3 shadow-md bg-white">
                    <div
                        class="h-[250px] w-full overflow-hidden rounded-2xl lg:h-[220px] 2xl:h-[300px]">
                            <a class="h-[250px] w-full lg:h-[220px]"
                            href="/products/${product.slug}">
                            <img
                                alt="BRSB cover photo" loading="lazy" width="592"
                                height="592" decoding="async" data-nimg="1"
                                class="h-full w-full object-cover object-bottom"
                                src="/storage/${product.image_url}"
                                style="color: transparent;"></a>
                    </div>
                    <div class="mt-3">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold">${product.name}</h3>
                            <p class="text-neutral-500 block text-sm line-through"></p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-neutral-500">${product.name}</p>
                            <p class="text-lg font-medium text-primary">${product.price_sale} Đ</p>
                        </div>
                    </div>
                </div>
            </li>`;
    }


    getRecommendProducts();
});