import { createRouter, createWebHistory } from 'vue-router';
import ContactForm from './ContactForm.vue';
import TicketTracker from './TicketTracker.vue';
import FuelPrices from './FuelPrices.vue';
import FuelStationReviews from "./FuelStationReviews.vue";
import FuelStationSearch from "./FuelStationSearch.vue";

const routes = [
    { path: '/support', component: ContactForm },
    { path: '/tickets', component: TicketTracker },
    { path: '/fuel-prices', component: FuelPrices },
    {
        path: '/fuel-stations/:fuelStationId',
        name: 'fuel-station-reviews',
        component: FuelStationReviews,
    },
    {
        path: '/fuel-stations/:fuelStationId',
        name: 'fuel-station-reviews',
        component: FuelStationSearch,
    },
];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

//export default routes;
export default router;
