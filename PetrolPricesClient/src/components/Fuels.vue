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
export default {
  data() {
    return {
      currentPrices: [],
      historicalPrices: [],
    };
  },
  mounted() {
    this.getCurrentPrices();
    /*this.getHistoricalPrices();*/
  },
  methods: {
    async getCurrentPrices() {
      try {
        const response = await this.$axios.get('http://localhost:8080/api/current-prices');
        this.currentPrices = response.data;
      } catch (error) {
        console.error('Błąd podczas pobierania aktualnych cen paliwa:', error);
      }
    },
    /*async getHistoricalPrices() {
      try {
        const response = await this.$axios.get('http://localhost:8080/api/historical-prices');
        this.historicalPrices = response.data;
      } catch (error) {
        console.error('Błąd podczas pobierania historycznych cen paliwa:', error);
      }
    },*/
  },
};
</script>
