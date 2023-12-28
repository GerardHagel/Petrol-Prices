<template>
    <div>
        <form @submit.prevent="searchFuelStations">
            <label for="location">Lokalizacja:</label>
            <input v-model="searchCriteria.location" type="text" id="location">

            <label for="fuelType">Rodzaj Paliwa:</label>
            <input v-model="searchCriteria.fuelType" type="text" id="fuelType">

            <button type="submit">Szukaj</button>
        </form>

        <div v-if="fuelStations.length > 0">
            <h2>Wyniki wyszukiwania:</h2>
            <ul>
                <li v-for="station in fuelStations" :key="station.id">
                    <strong>Nazwa:</strong> {{ station.name }} <br>
                    <strong>Lokalizacja:</strong> {{ station.location }} <br>
                    <strong>Rodzaj Paliwa:</strong> {{ station.fuel_type }} <br>
                </li>
            </ul>
        </div>
        <div v-else>
            <p>Brak wyników wyszukiwania.</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            searchCriteria: {
                location: '',
                fuelType: '',
            },
            fuelStations: [],
        };
    },
    methods: {
        searchFuelStations() {
            axios.post('/api/fuel-stations/search', this.searchCriteria)
                .then(response => {
                    this.fuelStations = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },
};
</script>
