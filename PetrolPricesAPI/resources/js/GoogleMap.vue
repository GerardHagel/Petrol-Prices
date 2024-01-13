<template>
    <div id="map" style="height: 500px;"></div>
</template>

<script>
import { Loader } from '@googlemaps/js-api-loader';

export default {
    data() {
        return {
            map: null,
            service: null,
        };
    },
    mounted() {
        this.loadMap();
    },
    methods: {
        loadMap() {
            const loader = new Loader({
                apiKey: window.googleMapsApiKey,
                version: 'weekly',
                libraries: ['places']
            });

            loader.load().then(() => {
                this.map = new google.maps.Map(document.getElementById('map'), {
                    center: { lat: 51.2044585, lng: 16.1500982 }, // Możesz ustawić odpowiednią lokalizację
                    zoom: 12,
                });
                this.service = new google.maps.places.PlacesService(this.map);
                this.searchGasStations();
            });
        },
        searchGasStations() {
            const request = {
                location: this.map.getCenter(),
                radius: '5000', // Szukaj w promieniu 5 km
                type: ['gas_station']
            };

            this.service.nearbySearch(request, (results, status) => {
                if (status === google.maps.places.PlacesServiceStatus.OK && results) {
                    for (let i = 0; i < results.length; i++) {
                        this.createMarker(results[i]);
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
