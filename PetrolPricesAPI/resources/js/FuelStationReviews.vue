import axios from "axios";

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
            review: '',
            rating: 1,
            reviews: [],
            averageRating: null,
        };
    },
    methods: {
        async submitReview() {
            try {
                console.log(this.$route.params);
                // Uzyskaj fuelStationId z obiektu $route
                const fuelStationId = this.$route ? this.$route.params.fuelStationId : null;

                if (!fuelStationId) {
                    console.error('Błąd: Nie można uzyskać fuelStationId.');
                    return;
                }

                // Wyślij recenzję do API i zaktualizuj dane
                await axios.post(`/api/fuel-stations/${fuelStationId}/reviews`, {
                    review: this.review,
                    rating: this.rating,
                });

                await this.fetchReviews();
                await this.fetchAverageRating();

                // Wyczyść pola po dodaniu recenzji
                this.review = '';
                this.rating = 1;
            } catch (error) {
                console.error('Błąd podczas dodawania recenzji:', error);
            }
        },

        async fetchReviews() {
            // Pobierz recenzje z API
            await this.fetchData('reviews');
        },

        async fetchAverageRating() {
            // Pobierz średnią ocenę z API
            await this.fetchData('average-rating');
        },

        async fetchData(endpoint) {
            const fuelStationId = this.$route?.params?.fuelStationId;

            if (!fuelStationId) {
                console.error('Błąd: Nie można uzyskać fuelStationId.');
                return;
            }

            const response = await axios.get(`/api/fuel-stations/${fuelStationId}/${endpoint}`);

            if (endpoint === 'reviews') {
                this.reviews = response.data;
            } else if (endpoint === 'average-rating') {
                this.averageRating = response.data.averageRating;
            }
        },
    },
    mounted() {
        // Wywołaj metody fetchReviews i fetchAverageRating przy załadowaniu komponentu
        this.fetchReviews();
        this.fetchAverageRating();
    },
};
</script>
