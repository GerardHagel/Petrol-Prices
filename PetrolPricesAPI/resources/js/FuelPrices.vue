<template>
    <div>
        <h2>Aktualne Ceny Paliw</h2>
        <ul>
            <li v-for="(price, index) in currentPrices" :key="index">
                {{ formatPrice(price.price) }} zł
            </li>
        </ul>
        <p v-if="currentPrices.length === 0">Brak danych o cenach paliw.</p>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            currentPrices: [],
        };
    },
    async mounted() {
        this.fetchPrices();
    },
    methods: {
        async fetchPrices() {
            try {
                const response = await axios.get('api/current-prices');
                this.currentPrices = response.data;
            } catch (error) {
                console.error(error);
            }
        },
        formatPrice(price) {
            // Dodaj dowolną logikę formatowania ceny tutaj, jeśli jest to potrzebne
            return parseFloat(price).toFixed(2); // Zaokrąglanie do dwóch miejsc po przecinku
        },
    },
};
</script>
