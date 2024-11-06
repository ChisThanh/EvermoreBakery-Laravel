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


function optionAPI(method = 'POST', body = {}) {
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const token = document.querySelector('meta[name="api-token"]').getAttribute('content');
    const options = {
        method: method,
        credentials: 'include',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest',
            'Authorization': `Bearer ${token}`,
        },
        body: JSON.stringify(body),
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

function addToCart(slug) {
    const cartId = document.querySelector('meta[name="cart-id"]').getAttribute('content');
    const { token, options } = optionAPI('POST', { cartId });
    return fetch(`/api/v1/add-to-cart/${slug}`, options)
        .then(response => response.json())
        .then(data => {
            if (data.status_code === 200) {
                openModal("Thêm vào giỏ hàng thành công", "Sản phẩm đã được thêm vào giỏ hàng", 3000);
            } else {
                openModal("Có lỗi xảy ra", "Vui lòng thử lại sau", 3000);
            }
        }).catch(() => {
            openModal("Có lỗi xảy ra", "Vui lòng thử lại sau", 3000);
        });
}

function updateCart(slug, quantity) {
    const cartId = document.querySelector('meta[name="cart-id"]').getAttribute('content');
    const { token, options } = optionAPI('POST', { cartId });
    return fetch(`/api/v1/update-from-cart/${slug}/${quantity}`, options)
        .then(response => response.json())
        .then(data => data.status_code === 200)
        .catch(() => false);
}

function removeItemCart(element, slug) {
    const cartItem = element.closest('.js-cart-item');
    const check = updateCart(slug, -999);
    if (check) {
        cartItem.remove();
    }
}

function updateQuantity(element, slug, quantity) {
    const quantityElement = element.closest('.js-item-quantity-container').querySelector('.js-item-quantity');
    var _quantity = parseInt(quantityElement.textContent);
    const check = updateCart(slug, quantity);
    if (check) {
        if (_quantity + quantity <= 0) {
            element.closest('.js-cart-item').remove();
            return;
        }
        var newQuantity = _quantity + quantity;
        quantityElement.textContent = newQuantity;
        // const priceElement = element.closest('.js-cart-item').querySelector('.js-item-price');
        // const price = extractNumbers(priceElement.textContent);
        // const totalElement = element.closest('.js-cart-item').querySelector('.js-cart-total');
        // var oldTotal = extractNumbers(totalElement.textContent);
        // const total = (oldTotal - (price * _quantity)) + (price * newQuantity);
        // totalElement.textContent = `${total} Đ`;
    }
}