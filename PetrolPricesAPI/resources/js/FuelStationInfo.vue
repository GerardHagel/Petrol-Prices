<template>
    <div>
        <h2>Aktualne ceny paliw</h2>
        <ul>
            <li v-for="price in currentPrices" :key="price.id">
                {{ price.fuel_type }}: {{ price.price }} zł ({{ price.date }})
            </li>
        </ul>

        <h2>Historyczne ceny paliw</h2>
        <ul>
            <li v-for="price in historicalPrices" :key="price.id">
                {{ price.fuel_type }}: {{ price.price }} zł ({{ price.date }})
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        currentPrices: {
            type: Array,
            required: true,
        },
        historicalPrices: {
            type: Array,
            required: true,
        },
    },
};
</script>
