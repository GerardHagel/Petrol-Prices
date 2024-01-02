import { createApp } from 'vue';
import FuelStationSearch from './FuelStationSearch.vue';
import FuelStationInfo from './FuelStationInfo.vue';
import FuelTypesInfo from './FuelTypesInfo.vue';
import FuelSavingTips from './FuelSavingTips.vue';


// Montuj komponenty na stronie
const fuelStationSearchApp = createApp(FuelStationSearch);
const fuelStationInfoApp = createApp(FuelStationInfo);
const fuelTypesInfoApp = createApp(FuelTypesInfo);
const fuelSavingTipsApp = createApp(FuelSavingTips);

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


