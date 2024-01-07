import './bootstrap';
import { createApp } from 'vue';
import CurrencyConverter from './CurrencyConverter.vue';


const app = createApp(CurrencyConverter);
app.mount('#currency-converter');
