import { createRouter, createWebHistory } from 'vue-router';
import ContactForm from './ContactForm.vue';
import TicketTracker from './TicketTracker.vue';
import FuelPrices from './FuelPrices.vue';

const routes = [
    { path: '/support', component: ContactForm },
    { path: '/tickets', component: TicketTracker },
    { path: '/fuel-prices', component: FuelPrices },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

//export default router;
export default routes;
