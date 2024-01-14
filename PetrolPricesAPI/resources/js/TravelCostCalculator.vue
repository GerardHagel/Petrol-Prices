<template>
    <div>
        <h3>Kalkulator Kosztów Podróży</h3>
        <a>Dystans</a>
        <input type="number" v-model.number="distance" placeholder="Dystans (km)">
        <a>Średnie zużycie paliwa</a>
        <input type="number" v-model.number="fuelConsumption" placeholder="Zużycie paliwa (l/100km)">
        <a>Cena Paliwa(za litra)</a>
        <input type="number" v-model.number="fuelPrice" placeholder="Cena paliwa (za litr)">
        <button @click="calculateCost">Oblicz Koszt</button>
        <div v-if="totalCost !== null">
            Całkowity koszt podróży: {{ totalCost.toFixed(2) }}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            distance: 0,
            fuelConsumption: 0,
            fuelPrice: 0,
            totalCost: null,
        };
    },
    methods: {
        calculateCost() {
            this.totalCost = (this.distance / 100) * this.fuelConsumption * this.fuelPrice;
        },
    },
};
</script>
