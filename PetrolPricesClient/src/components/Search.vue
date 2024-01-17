<template>
    <div class="form-box">
      <!-- Formularz wyszukiwania -->
      <form @submit.prevent="searchFuelStations">
        <label for="location">Lokalizacja:</label><br>
        <input v-model="searchParams.location" id="location" /><br>
  
        <label for="fuelType">Typ paliwa:</label><br>
        <input v-model="searchParams.fuel_type" id="fuelType" /><br>
  
        <label for="maxPrice">Maksymalna cena:</label><br>
        <input v-model.number="searchParams.max_price" id="maxPrice" type="number" /><br>
  
        <label for="openNow">Otwarte teraz:</label><br>
        <input v-model="searchParams.open_now" id="openNow" type="checkbox" /><br>
  
        <button type="submit">Szukaj</button>
      </form>
  
      <!-- Lista stacji paliw -->
      <ul>
        <li v-for="station in fuelStations" :key="station.id">
          {{ station.name }} - {{ station.location }} - {{ station.price }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        fuelStations: [],
        searchParams: {
          location: '',
          fuel_type: '',
          max_price: null,
          open_now: false,
        },
      };
    },
    methods: {
      searchFuelStations() {
        axios.post('http://localhost:8080/api/fuel-stations/search', { params: this.searchParams })
          .then(response => {
            this.fuelStations = response.data;
          })
          .catch(error => {
            console.error('Błąd podczas wyszukiwania stacji paliw', error);
          });
      },
    },
  };
  </script>
  