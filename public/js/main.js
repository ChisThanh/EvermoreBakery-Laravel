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
                if(data.status_code === 200 && data.data.quantity <= 0){
                    alert('Coupon has been used up!');
                    return;
                }
                if (data.status_code === 200 ) {
                    const { discount_amount, discount_percentage } = data.data;
                    const discountAmount = parseInt(discount_amount);
                    const discountPercentage = parseInt(discount_percentage);

                    const discountByAmount = totalNumber - discountAmount;
                    const discountByPercentage = totalNumber * (1 - discountPercentage / 100);
                    totalNumber = Math.min(discountByAmount, discountByPercentage);

                    jsTotal.textContent = `${totalNumber} Đ`;
                    alert('Coupon applied successfully!');
                    element.setAttribute('data-click', 'false');
                }
            })
            .catch(error => console.log('Error applying coupon:', error));
    }
}