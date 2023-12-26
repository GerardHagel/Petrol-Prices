// resources/js/map.js

import { createApp } from 'vue';
import GoogleMap from './GoogleMap.vue';

const app = createApp(GoogleMap);
app.mount('#map-app');
