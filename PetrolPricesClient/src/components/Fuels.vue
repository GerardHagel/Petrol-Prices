<template>
  <div>
    <h2>Aktualne ceny paliwa</h2><br>
    <ul>
      <li v-for="price in currentPrices" :key="price.id">
        {{ price.fuel_type }}: {{ price.price }}
      </li>
    </ul>

    <h2>Historyczne ceny paliwa</h2><br>
    <ul>
      <li v-for="price in historicalPrices" :key="price.id">
        {{ price.fuel_type }}: {{ price.price }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      currentPrices: [],
      /*historicalPrices: [],*/
    };
  },
  mounted() {
    // Pobierz aktualne ceny
    this.getCurrentPrices();
  },
  methods: {
    getCurrentPrices() {
      // Wywołaj API, aby pobrać aktualne ceny
      axios.get('http://localhost:8000/api/current-prices')
        .then(response => {
          this.currentPrices = response.data;
        })
        .catch(error => {
          console.error('Błąd podczas pobierania aktualnych cen', error);
        });},
    // Pobierz historyczne ceny
    /*axios.get('http://localhost:8080/api/historical-prices')
      .then(response => {
        this.historicalPrices = response.data;
      })
      .catch(error => {
        console.error('Błąd podczas pobierania historycznych cen', error);
      });*/
  },
};
</script>
