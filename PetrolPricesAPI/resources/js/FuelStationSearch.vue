<template>
    <div>
        <form @submit.prevent="searchFuelStations">
            <label for="location">Lokalizacja:</label>
            <input v-model="searchCriteria.location" type="text" id="location">
<br> <br>
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
                    <strong>Rodzaj Paliwa:</strong> {{ station.fuelType }} <br>
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
    /*   methods: {
        searchFuelStations() {
            if (!this.searchCriteria.location && !this.searchCriteria.fuelType) {
                console.error('Błąd: Wprowadź lokalizację lub rodzaj paliwa.');
                return;
            }

            console.log('Search criteria:', this.searchCriteria);

            axios.post("/api/fuel-stations/search", this.searchCriteria)
                .then(response => {
                    this.fuelStations = response.data;
                })
                .catch(error => {
                    console.error('Błąd podczas wysyłania zapytania', error);
                });
        },
    },
};

  */
    methods: {
        async searchFuelStations() {
            try {
                // Utwórz zmienną z odpowiedzi na żądanie POST
                const response = await axios.post(`/api/fuel-stations/search`, this.searchCriteria);

                // Zrób coś z odpowiedzią (jeśli potrzebujesz)
                console.log(response.data);

                // Dalsza część kodu, np. przypisanie danych do this.fuelStations
            } catch (error) {
                // Obsłuż błąd, jeśli wystąpił
                console.error('Błąd podczas wysyłania zapytania POST:', error);
            }
        },
    },
}
</script>
