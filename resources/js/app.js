// Import the components from the "tw-elements" package
import { Carousel, Ripple, initTE } from "tw-elements";



// Your existing code for Alpine.js and focus
import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start();

// Initialize the components using the initTE function
initTE({ Carousel, Ripple });
