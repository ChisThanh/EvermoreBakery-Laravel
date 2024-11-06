// function
const toggleVisibility = (element) => {
    element.classList.toggle('hidden');
};

// Cart 
const cartButton = document.querySelector('#cart-button');
const mainCart = document.querySelector('#main-cart');
const mainCartClose = document.querySelector('#main-cart-close');


// Menu toggle 
const menuToggle = document.querySelector('#menu-toggle');
const mainMenuToggle = document.querySelector('#main-menu-toggle');
const closeMenuToggle = document.querySelector('#close-menu-toggle');


// document ready
document.addEventListener('DOMContentLoaded', () => {
    cartButton.addEventListener('click', () => toggleVisibility(mainCart));
    mainCartClose.addEventListener('click', () => toggleVisibility(mainCart));
    menuToggle.addEventListener('click', () => toggleVisibility(mainMenuToggle));
    closeMenuToggle.addEventListener('click', () => toggleVisibility(mainMenuToggle));
});


function optionAPI() {
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const token = document.querySelector('meta[name="api-token"]').getAttribute('content');
    const options = {
        method: 'POST',
        credentials: 'include',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest',
            'Authorization': `Bearer ${token}`,
        },
    };
    return { token, options };
}

function likeProduct(slug, element) {
    const liked = element.getAttribute('data-liked');
    const svgPath = element.querySelector('svg path');

    if (liked !== '1') {
        svgPath.setAttribute('fill', '#e94e07');
        svgPath.setAttribute('stroke-width', '0');
        element.setAttribute('data-liked', '1');
    } else {
        svgPath.setAttribute('fill', 'none');
        svgPath.setAttribute('stroke-width', '1.5');
        element.setAttribute('data-liked', '0');
    }

    const { token, options } = optionAPI();

    if (token !== '') {
        fetch(`/api/v1/products/${slug}/like`, options);
    }
}

function extractNumbers(str) {
    const numbers = str.match(/\d+/g);
    const joinedNumbers = numbers ? numbers.join('') : '';
    return parseInt(joinedNumbers);
}

function applyCoupon(element) {
    const input = element.previousElementSibling;
    const dataClickBtn = element.getAttribute('data-click');
    const code = input.value.trim();
    const { token, options } = optionAPI();

    if (token && code && dataClickBtn === 'true') {
        const jsTotal = document.querySelector('.js-total');
        let totalNumber = extractNumbers(jsTotal.textContent);
        fetch(`/api/v1/coupons/${code}`, options)
            .then(response => response.json())
            .then(data => {
                if (data.status_code === 200 && data.data.quantity <= 0) {
                    input.value = '';
                    openModal("Mã giảm giá đã hết", "Vui lòng thử lại sau", 3000);
                    return;
                }
                if (data.status_code === 200) {
                    const { discount_amount, discount_percentage } = data.data;
                    const discountAmount = parseInt(discount_amount);
                    const discountPercentage = parseInt(discount_percentage);

                    const discountByAmount = totalNumber - discountAmount;
                    const discountByPercentage = totalNumber * (1 - discountPercentage / 100);
                    totalNumber = Math.floor(Math.min(discountByAmount, discountByPercentage));
                    totalNumber = parseInt(totalNumber);

                    jsTotal.textContent = `${totalNumber} Đ`;
                    openModal("Áp dụng mã giảm giá thành công", "Bạn đã áp dụng mã giảm giá thành công", 3000);
                    element.setAttribute('data-click', 'false');
                } else {
                    input.value = '';
                    openModal("Mã giảm giá không hợp lệ", "Vui lòng thử lại sau", 3000);
                }
            })
            .catch(error => {
                input.value = '';
                openModal("Có lỗi xảy ra", "Vui lòng thư lại sau", 3000);
            });
    }
}



function openModal(
    title = "Confirm Action",
    content = "Are you sure",
    timeout = 0,
) {
    const existingModal = document.getElementById('confirmationModal');
    if (existingModal) {
        existingModal.remove();
    }

    const modal = document.createElement('div');
    modal.id = 'confirmationModal';
    modal.className = 'fixed inset-0 bg-opacity-50 flex items-center justify-center bg-neutral-900/60 opacity-100 z-[99999] ';

    modal.innerHTML = `
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full modal-overlay">
            <h2 class="text-lg font-bold mb-4">${title}</h2>
            <p class="text-gray-700 mb-6">${content}</p>
            <div class="flex justify-end">
                <button id="cancelButton" class="bg-gray-500 px-4 py-2 rounded mr-2">Cancel</button>
                <button id="confirmButton" class="bg-red-500 text-white px-4 py-2 rounded">Confirm</button>
            </div>
        </div>
    `;

    document.body.appendChild(modal);

    let interval;

    function closeModal() {
        clearInterval(interval);
        modal.remove();
    }

    document.getElementById('cancelButton').addEventListener('click', closeModal);
    document.getElementById('confirmButton').addEventListener('click', closeModal);

    if (timeout > 0) {
        const cancelButton = document.getElementById('cancelButton');
        let remainingTime = timeout / 1000;

        interval = setInterval(() => {
            remainingTime -= 1;
            cancelButton.textContent = `Cancel (${remainingTime})`;
            if (remainingTime <= 0) {
                closeModal();
            }
        }, 1000);
    }
}
