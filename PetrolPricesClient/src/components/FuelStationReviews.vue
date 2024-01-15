<template>
    <div>
      <h2>Dodaj recenzję</h2>
      <form @submit.prevent="addReview">
        <label for="review">Recenzja:</label>
        <textarea v-model="review" id="review" required></textarea>
  
        <label for="rating">Ocena (1-5):</label>
        <input v-model.number="rating" id="rating" type="number" min="1" max="5" required />
  
        <button type="submit">Dodaj recenzję</button>
      </form>
  
      <h2>Średnia ocena:</h2>
      <p v-if="averageRating !== null">{{ averageRating.toFixed(2) }}</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        review: '',
        rating: 1,
        averageRating: null,
      };
    },
    methods: {
      async addReview() {
        try {
          const response = await this.$axios.post(`/fuel-stations/${this.fuelStationId}/reviews`, {
            review: this.review,
            rating: this.rating,
          });
  
          console.log(response.data.message); // Możesz obsługiwać odpowiedź z serwera
  
          // Odśwież średnią ocenę po dodaniu recenzji
          await this.fetchAverageRating();
        } catch (error) {
          console.error('Błąd podczas dodawania recenzji:', error);
          // Możesz dodać obsługę błędów, np. wyświetlanie komunikatu użytkownikowi
        }
      },
      async fetchAverageRating() {
        try {
          const response = await this.$axios.get(`/fuel-stations/${this.fuelStationId}/average-rating`);
          this.averageRating = response.data.averageRating;
        } catch (error) {
          console.error('Błąd podczas pobierania średniej oceny:', error);
          // Możesz dodać obsługę błędów, np. wyświetlanie komunikatu użytkownikowi
        }
      },
    },
    props: {
      fuelStationId: {
        type: Number,
        required: true,
      },
    },
    mounted() {
      // Pobierz średnią ocenę po zamontowaniu komponentu
      this.fetchAverageRating();
    },
  };
  </script>
  
  <style scoped>
  /* Dodaj style, jeśli to konieczne */
  </style>
  