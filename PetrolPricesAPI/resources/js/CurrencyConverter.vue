<template>
    <div>
        <h3>Kalkulator Walutowy</h3>
        <input type="number" v-model.number="amount" placeholder="Kwota">
        <select v-model="fromCurrency">
            <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
        </select>
        <select v-model="toCurrency">
            <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
        </select>
        <button @click="convertCurrency">Konwertuj</button>
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
        convertCurrency() {
            // Zmiana URL na endpoint Laravel
            const apiUrl = `/api/convert?from=${this.fromCurrency}&to=${this.toCurrency}&amount=${this.amount}`;

            axios.get(apiUrl).then(response => {
                this.convertedAmount = response.data.convertedAmount;
            }).catch(error => {
                console.error('Błąd konwersji waluty:', error);
                // Możesz dodać obsługę błędów, np. wyświetlanie komunikatu użytkownikowi
            });
        },
    },
};
</script>
