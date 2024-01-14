<template>
    <div>
        <h2>Aktualne Ceny Paliw</h2>
        <ul>
            <li v-for="price in currentPrices" :key="price.id">
                {{ price.fuel_type }}: {{ price.price }} zł ({{ price.date }})
            </li>
        </ul>

        <h2>Historyczne Ceny Paliw</h2>
        <ul>
            <li v-for="price in historicalPrices" :key="price.id">
                {{ price.fuel_type }}: {{ price.price }} zł ({{ price.date }})
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentPrices: [],
            historicalPrices: [],
        };
    },
    methods: {
        async mounted() {
            await this.fetchCurrentPrices();
            await this.fetchHistoricalPrices();
        },

        async fetchCurrentPrices() {
            this.currentPrices = await axios.get('/api/current-prices').then(response => response.data);
        },

        async fetchHistoricalPrices() {
            this.historicalPrices = await axios.get('/api/historical-prices').then(response => response.data);
        },
    },
};
</script>

