<template>
    <div>
        <h2>Recenzje i Oceny</h2>
        <form @submit.prevent="submitReview">
            <label for="review">Recenzja:</label>
            <textarea v-model="review" id="review" required></textarea>

            <label for="rating">Ocena:</label>
            <input type="number" v-model="rating" id="rating" required min="1" max="5">

            <button type="submit">Dodaj Recenzję</button>
        </form>

        <div v-if="averageRating !== null">
            <p>Średnia ocena: {{ averageRating.toFixed(2) }}</p>
        </div>

        <ul>
            <li v-for="review in reviews" :key="review.id">
                <p>{{ review.user.name }}: {{ review.review }} ({{ review.rating }}/5)</p>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fuelStationId: 1, // Zmiana na właściwość przechowującą fuelStationId
            review: '',
            rating: 1,
            reviews: [],
            averageRating: null,
        };
    },
    mounted() {
        this.fetchReviews(); // Usunięcie async z metody mounted
        this.fetchAverageRating(); // Usunięcie async z metody mounted
    },
    methods: {
        async submitReview() {
            // Wyślij recenzję do API i zaktualizuj dane
            await axios.post(`/api/fuel-stations/${this.fuelStationId}/reviews`, {
                review: this.review,
                rating: this.rating,
            });

            await this.fetchReviews();
            await this.fetchAverageRating();

            // Wyczyść pola po dodaniu recenzji
            this.review = '';
            this.rating = 1;
        },

        async fetchReviews() {
            // Pobierz recenzje z API
            this.reviews = await axios.get(`/api/fuel-stations/${this.fuelStationId}/reviews`).then(response => response.data);
        },

        async fetchAverageRating() {
            // Pobierz średnią ocenę z API
            this.averageRating = await axios.get(`/api/fuel-stations/${this.fuelStationId}/average-rating`).then(response => response.data.averageRating);
        },
    },
};
</script>
