require('./bootstrap');

window.Vue = require('vue');

Vue.component('fuel-station-search', require('./components/FuelStationSearch.vue').default);

const app = new Vue({
    el: '#app',
});
