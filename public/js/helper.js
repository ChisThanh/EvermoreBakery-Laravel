function generateRandomString(length) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let result = new Array(length);
    for (let i = 0; i < length; i++)
        result[i] = characters.charAt(Math.floor(Math.random() * charactersLength));
    return result.join('');
}

function extractNumbers(str) {
    const numbers = str.match(/\d+/g);
    const joinedNumbers = numbers ? numbers.join('') : '';
    return parseInt(joinedNumbers);
}

const toggleVisibility = (element) => {
    element.classList.toggle('hidden');
};

function debounce(func, wait = 100) {
    let timeout;
    return function (...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function openModal(
    title = "Confirm Action",
    content = "Are you sure",
    confirmText = "Confirm",
    cancelText = "Cancel",
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
                <button id="cancelButton" class="bg-gray-500 px-4 py-2 rounded mr-2">${cancelText}</button>
                <button id="confirmButton" class="bg-red-500 text-white px-4 py-2 rounded">${confirmText}</button>
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

function openToast(type = 'success', message = 'Item moved successfully', timeout = 4000) {
    const svgIcons = {
        success: `
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>`,
        error: `
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>`,
        warning: `
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>`
    };

    const colors = {
        success: 'text-green-500 bg-green-100',
        error: 'text-red-500 bg-red-100',
        warning: 'text-orange-500 bg-orange-100',
    };

    const toastMain = document.createElement('div');
    toastMain.id = "toast-main";
    toastMain.className = "fixed top-10 left-1/2 transform -translate-x-1/2 opacity-100 z-[99999] shadow-2xl animate-slide-down";
    toastMain.innerHTML = `
        <div class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 ${colors[type] || colors.success} rounded-lg">
                ${svgIcons[type] || svgIcons.success}
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">${message}</div>
        </div>
    `;

    document.body.appendChild(toastMain);
    let interval;
    const closeToast = () => {
        clearInterval(interval);
        toastMain.remove();
    };

    if (timeout > 0) {
        let remainingTime = timeout / 1000;
        interval = setInterval(() => {
            remainingTime -= 1;
            if (remainingTime <= 0) closeToast();
        }, 1000);
    }
}


