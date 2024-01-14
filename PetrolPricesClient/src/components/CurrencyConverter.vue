
<template>
  <div>
    <h2>Kalkulator Walutowy</h2>
    <!-- Formularz do wprowadzenia danych -->
    <input v-model="amount" type="number" placeholder="Kwota" />
    <select v-model="fromCurrency">
      <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
    </select>
    <select v-model="toCurrency">
      <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
    </select>
    <button @click="convertCurrency">Konwertuj</button>

    <!-- Wyświetlanie wyniku konwersji -->
    <div v-if="convertedAmount !== null">
      Skonwertowana kwota: {{ convertedAmount.toFixed(2) }} {{ toCurrency }}
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      amount: 0,
      fromCurrency: 'USD',
      toCurrency: 'EUR',
      convertedAmount: null,
      currencies: ['USD', 'EUR', 'PLN'], // Lista dostępnych walut
    };
  },
  methods: {
    async convertCurrency() {
      try {
        const response = await axios.get('/convert-currency', {
          params: {
            from: this.fromCurrency,
            to: this.toCurrency,
            amount: this.amount,
          },
        });

        // Przypisanie wyniku konwersji
        this.convertedAmount = response.data.convertedAmount;
      } catch (error) {
        console.error('Błąd podczas konwersji waluty:', error);
        // Możesz dodać obsługę błędów, np. wyświetlanie komunikatu użytkownikowi
      }
    },
  },
};
</script>
<style scoped>
div{float: left;width: 100%; margin: 5%;}
</style>