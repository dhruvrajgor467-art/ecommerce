import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Echo.channel('admin-orders').listen('.order.placed', (e) => {

    let count = document.getElementById('notificationCount');
    
    count.innerText = parseInt(count.innerText) + 1;

    showToast(
        "New Order Received #" + e.order.id,
        "success"
    );

});

function showToast(message, type = 'success') {

    const container = document.getElementById('toast-container');

    const toast = document.createElement('div');

    let bg = '';
    let icon = '';

    if (type === 'success') {
        bg = 'bg-gradient-to-r from-green-500 to-emerald-600';
        icon = '🛒';
    }

    if (type === 'error') {
        bg = 'bg-gradient-to-r from-red-500 to-pink-600';
        icon = '❌';
    }

    if (type === 'info') {
        bg = 'bg-gradient-to-r from-blue-500 to-indigo-600';
        icon = 'ℹ️';
    }

    toast.className = `
        ${bg}
        text-white
        shadow-2xl
        rounded-xl
        px-5 py-4
        min-w-[320px]
        max-w-sm
        animate-slide-in
        relative
        overflow-hidden
    `;

    toast.innerHTML = `
        <div class="flex items-start gap-3">

            <div class="text-2xl">
                ${icon}
            </div>

            <div class="flex-1">
                <p class="font-semibold text-sm">
                    ${message}
                </p>

                <p class="text-xs opacity-80 mt-1">
                    Just now
                </p>
            </div>

            <button onclick="this.parentElement.parentElement.remove()"
                class="text-white/80 hover:text-white text-lg leading-none">
                ×
            </button>

        </div>

        <div class="absolute bottom-0 left-0 h-1 bg-white/30 w-full">
            <div class="h-1 bg-white animate-progress"></div>
        </div>
    `;

    container.appendChild(toast);

    // Auto remove after 10 sec
    setTimeout(() => {
        toast.remove();
    }, 10000);
}