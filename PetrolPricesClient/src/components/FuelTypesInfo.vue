<template>
    <div>
        <h2>Informacje o rodzajach paliw, właściwościach i zastosowaniach</h2>
        <ul>
            <li v-for="fuelType in fuelTypes" :key="fuelType.id">
                <strong>Nazwa:</strong> {{ fuelType.name }} <br>
                <strong>Właściwości:</strong> {{ fuelType.properties }} <br>
                <div class="description"><strong>Zastosowania:</strong> {{ fuelType.applications }} <br>
                    <strong>Przykładowe auto:</strong> {{ fuelType.car }} <br> <br>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fuelTypes: [
                {
                    id: 1,
                    name: 'Benzyna 95',
                    properties: 'Łatwopalna, o dużej zawartości energii.',
                    applications: 'Stosowana w silnikach benzynowych samochodów.',
                    car: 'Toyota Corolla, Volkswagen Golf, Ford Focus',
                },
                {
                    id: 2,
                    name: 'Benzyna 98',
                    properties: 'Łatwopalna, o dużej zawartości energii, wyższy stopień oktanowy.',
                    applications: 'Stosowana w silnikach o wyższych wymaganiach oktanowych.',
                    car: 'BMW 3 Series ,Audi A4 ,Mercedes-Benz C-Class',
                },
                {
                    id: 3,
                    name: 'Olej napędowy',
                    properties: 'Mniej łatwopalny niż benzyna, wydajny.',
                    applications: 'Stosowany w silnikach wysokoprężnych samochodów, ciężarówek.',
                    car: 'Volkswagen Passat TDI, Ford F-150 Diesel, Chevrolet Silverado Diesel',
                },
                {
                    id: 4,
                    name: 'Gaz LPG',
                    properties: 'Gaz skroplony, ekonomiczny.',
                    applications: 'Stosowany w silnikach samochodów z instalacją gazową.',
                    car: 'Fiat Panda LPG, Opel Corsa LPG, Dacia Duster LPG',
                },
                {
                    id: 5,
                    name: 'CNG (Sprężony gaz ziemny)',
                    properties: 'Gaz skroplony, niskie emisje.',
                    applications: 'Stosowany w pojazdach z silnikami przystosowanymi do CNG.',
                    car: 'Honda Civic GX, Fiat 500 Natural Power, Volvo V60 Bi-Fuel',
                },
                {
                    id: 6,
                    name: 'Diesel Premium',
                    properties: 'Wydajny olej napędowy o lepszych właściwościach.',
                    applications: 'Stosowany w silnikach wysokoprężnych, szczególnie w nowoczesnych pojazdach.',
                    car: 'Audi Q7 TDI, BMW X5 xDrive35d, Mercedes-Benz E350 BlueTEC',
                },
                {
                    id: 7,
                    name: 'Biodiesel B20',
                    properties: 'Olej napędowy z dodatkiem biodiesla (20%).',
                    applications: 'Stosowany w silnikach wysokoprężnych, bardziej ekologiczna alternatywa.',
                    car: 'Volkswagen Jetta TDI (diesel), Chevrolet Silverado 2500HD (diesel), Ford F-350 Super Duty (diesel)',
                },
            ],
        };
    },
};
</script>

<style scoped>
div:not(h2) {
    color: white;
    border-top: 1px solid #353535;
}
.description{
    color: #5a5a5a;
}
</style>