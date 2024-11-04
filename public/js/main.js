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