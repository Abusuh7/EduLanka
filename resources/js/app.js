// Import the components from the "tw-elements" package
import { Carousel, initTE } from "tw-elements";

// Your existing code
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start();

// Initialize the carousel using the initTE function
initTE({ Carousel });



