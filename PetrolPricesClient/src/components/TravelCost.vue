<template>
    <div class="form-box">
        <h3>Kalkulator Kosztów Podróży</h3>
        <div class="txt">Dystans</div>
        <input type="number" v-model.number="distance" placeholder="Dystans (km)" />
        <div class="txt">Średnie zużycie paliwa</div>
        <input type="number" v-model.number="fuelConsumption" placeholder="Zużycie paliwa (l/100km)" />
        <div class="txt">Cena Paliwa(za litra)</div>
        <input type="number" v-model.number="fuelPrice" placeholder="Cena paliwa (za litr)" />
        <div><button @click="calculateCost">Oblicz Koszt</button></div>
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
            this.totalCost =
                (this.distance / 100) * this.fuelConsumption * this.fuelPrice;
        },
    },
};
</script>


