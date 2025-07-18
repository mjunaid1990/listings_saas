import './bootstrap';
import Swal from 'sweetalert2';

// Make Swal available globally
window.Swal = Swal;
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import 'summernote/dist/summernote-lite.css';
import 'summernote/dist/summernote-lite.js';
import $ from 'jquery';
window.$ = window.jQuery = $;

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// Add sidebar toggle functionality
Alpine.data('sidebar', () => ({
    isOpen: false,

    toggle() {
        this.isOpen = !this.isOpen;
    },

    init() {
        // Add event listener for window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 640) {
                this.isOpen = true;
            }
        });
    }
}));