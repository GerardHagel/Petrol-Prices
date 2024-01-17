<template>
  <div>
    <h2>Fuel Stations Panel</h2>

    <!-- Formularz dodawania stacji paliw -->
    <form @submit.prevent="addFuelStation" class="form-box">
      <label for="name">Nazwa:</label>
      <input v-model="newFuelStation.name" id="name" required />

      <label for="location">Lokalizacja:</label>
      <input v-model="newFuelStation.location" id="location" required />

      <label for="fuelType">Typ paliwa:</label>
      <input v-model="newFuelStation.fuelType" id="fuelType" required />

      <label for="price">Cena:</label>
      <input v-model.number="newFuelStation.price" id="price" type="number" required />

      <label for="openingHours">Godziny otwarcia:</label>
      <input v-model="newFuelStation.openingHours" id="openingHours" required />

      <button type="submit">Dodaj stację</button>
    </form>

    <!-- Lista stacji paliw -->
    <ul>
      <li v-for="station in fuelStations" :key="station.id">
        <span>{{ station.name }} - {{ station.location }}</span>
        <button @click="editFuelStation(station)">Edytuj</button>
        <button @click="deleteFuelStation(station.id)">Usuń</button>
      </li>
    </ul>

    <!-- Formularz edycji stacji paliw -->
    <div v-if="editingFuelStation">
      <h3>Edytuj stację: {{ editingFuelStation.name }}</h3>
      <form @submit.prevent="updateFuelStation">
        <label for="editName">Nowa nazwa:</label>
        <input v-model="editingFuelStation.name" id="editName" required />

        <label for="editLocation">Nowa lokalizacja:</label>
        <input v-model="editingFuelStation.location" id="editLocation" required />

        <label for="editFuelType">Nowy typ paliwa:</label>
        <input v-model="editingFuelStation.fuelType" id="editFuelType" required />

        <label for="editPrice">Nowa cena:</label>
        <input v-model.number="editingFuelStation.price" id="editPrice" type="number" required />

        <label for="editOpeningHours">Nowe godziny otwarcia:</label>
        <input v-model="editingFuelStation.openingHours" id="editOpeningHours" required />

        <button type="submit">Zapisz zmiany</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      fuelStations: [],
      newFuelStation: {
        name: '',
        location: '',
        fuelType: '',
        price: 0,
        openingHours: '',
      },
      editingFuelStation: null,
    };
  },
  methods: {
    async addFuelStation() {
      try {
        const response = await axios.post('http://localhost:8080/api/fuel-stations', this.newFuelStation);
        this.fuelStations.push(response.data); // Dodaj nową stację do listy
        this.newFuelStation = {}; // Wyczyść formularz
      } catch (error) {
        console.error('Błąd podczas dodawania stacji paliw:', error);
      }
    },
    editFuelStation(station) {
      this.editingFuelStation = { ...station }; // Skopiuj stację do obiektu edycji
    },
    async updateFuelStation() {
      try {
        const response = await axios.put(`http://localhost:8080/api/fuel-stations/${this.editingFuelStation.id}`, this.editingFuelStation);
        const index = this.fuelStations.findIndex(station => station.id === this.editingFuelStation.id);
        this.$set(this.fuelStations, index, response.data); // Zaktualizuj stację na liście
        this.editingFuelStation = null; // Zakończ edycję
      } catch (error) {
        console.error('Błąd podczas aktualizacji stacji paliw:', error);
      }
    },
    async deleteFuelStation(id) {
      try {
        await axios.delete(`http://localhost:8080/api/fuel-stations/${id}`);
        this.fuelStations = this.fuelStations.filter(station => station.id !== id); // Usuń stację z listy
      } catch (error) {
        console.error('Błąd podczas usuwania stacji paliw:', error);
      }
    },
    async fetchFuelStations() {
      try {
        const response = await axios.get('http://localhost:8080/api/fuel-stations');
        this.fuelStations = response.data; // Ustaw listę stacji paliw
      } catch (error) {
        console.error('Błąd podczas pobierania stacji paliw:', error);
      }
    },
  },
  mounted() {
    // Pobierz stacje paliw po zamontowaniu komponentu
    this.fetchFuelStations();
  },
};
</script>
