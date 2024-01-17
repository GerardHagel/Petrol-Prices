<template>
    <div id="map" style="height: 500px;"></div>
</template>

<script>
import axios from 'axios';
import { Loader } from '@googlemaps/js-api-loader';

export default {
  data() {
    return {
      map: null,
      service: null,
    };
  },
  mounted() {
    this.loadApiKeyAndInitMap();
  },
  methods: {
    loadApiKeyAndInitMap() {
      axios.get('http://localhost:8080/api/get-api-key')
          .then(response => {
            this.initMap(response.data.apiKey);
          })
          .catch(error => {
            console.error("Error fetching the API key:", error);
          });
    },
    initMap(apiKey) {
      const loader = new Loader({
        apiKey: apiKey,
        version: 'weekly',
        libraries: ['places']
      });

      loader.load().then(() => {
        this.map = new google.maps.Map(document.getElementById('map'), {
          center: { lat: 51.2044585, lng: 16.1500982 },
          zoom: 12,
        });
        this.service = new google.maps.places.PlacesService(this.map);
        this.searchGasStations();
      });
    },
    searchGasStations() {
      const request = {
        location: this.map.getCenter(),
        radius: '5000',
        type: ['gas_station']
      };

      this.service.nearbySearch(request, (results, status) => {
        if (status === google.maps.places.PlacesServiceStatus.OK && results) {
          for (let i = 0; i < results.length; i++) {
            this.createMarker(results[i
                ]);
          }
        }
      });
    },
    createMarker(place) {
      new google.maps.Marker({
        position: place.geometry.location,
        map: this.map,
        title: place.name,
      });
    }
  }
}
</script>

<style scoped>
#map {
  border: 1px solid silver;
  min-width: 500px;
}
</style>