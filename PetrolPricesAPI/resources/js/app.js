import { createApp } from 'vue';
import FuelStationSearch from './FuelStationSearch.vue';
import FuelStationInfo from './FuelStationInfo.vue';
import FuelTypesInfo from './FuelTypesInfo.vue';
import FuelSavingTips from './FuelSavingTips.vue';
import ContactForm from "./ContactForm.vue";
import TicketTracker from "./TicketTracker.vue";
import FuelPrices from "./FuelPrices.vue";
import FuelStationReviews from './FuelStationReviews.vue';
import router from "./router.js";



// Montuj komponenty na stronie
const fuelStationSearchApp = createApp(FuelStationSearch);
const fuelStationInfoApp = createApp(FuelStationInfo);
const fuelTypesInfoApp = createApp(FuelTypesInfo);
const fuelSavingTipsApp = createApp(FuelSavingTips);
const fuelPricesApp = createApp(FuelPrices);
const fuelStationReviewsApp = createApp(FuelStationReviews);

// Znajdź kontenery w dokumencie i zamontuj komponenty w nich
const fuelStationSearchContainer = document.getElementById('fuel-station-search');
if (fuelStationSearchContainer) {
    fuelStationSearchApp.mount(fuelStationSearchContainer);
}

const fuelStationInfoContainer = document.getElementById('fuel-station-info');
if (fuelStationInfoContainer) {
    fuelStationInfoApp.mount(fuelStationInfoContainer);
}

const fuelTypesInfoContainer = document.getElementById('fuel-types-info');
if (fuelTypesInfoContainer) {
    fuelTypesInfoApp.mount(fuelTypesInfoContainer);
}

const fuelSavingTipsContainer = document.getElementById('fuel-saving-tips');
if (fuelSavingTipsContainer) {
    fuelSavingTipsApp.mount(fuelSavingTipsContainer);
}

const fuelPricesContainer = document.getElementById('fuel-prices');
if (fuelPricesContainer) {
    fuelPricesApp.mount(fuelPricesContainer);
}

const fuelStationReviewsContainer = document.getElementById('fuel-station-reviews');
if (fuelStationReviewsContainer) {
    fuelStationReviewsApp.mount(fuelStationReviewsContainer);
}

createApp(ContactForm).use(router).mount('#contact-form');
createApp(TicketTracker).use(router).mount('#ticket-tracker');
