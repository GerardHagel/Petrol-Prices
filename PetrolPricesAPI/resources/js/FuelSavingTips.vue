<!-- resources/js/components/FuelSavingTips.vue -->

<template>
    <div>
        <h2>Artykuły i porady dotyczące oszczędzania paliwa i bezpiecznej jazdy</h2>
        <ul>
            <li v-for="tip in fuelSavingTips" :key="tip.id">
                <strong>Tytuł:</strong> {{ tip.title }} <br>
                <strong>Treść:</strong> {{ tip.content }} <br> <br>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fuelSavingTips: [
                {
                    id: 1,
                    title: 'Sztuka Oszczędzania Paliwa: Praktyczne Porady Dla Kierowców',
                    content: 'Oszczędne korzystanie z paliwa to kluczowa sprawa zarówno dla Twojego portfela, jak i dla środowiska. Aby osiągnąć maksymalną efektywność spalania, warto wdrożyć kilka prostych nawyków podczas jazdy.\n' +
                        '\n' +
                        'Przede wszystkim, utrzymuj umiarkowaną prędkość. Gwałtowne przyspieszanie i hamowanie znacznie zwiększa zużycie paliwa. Dodatkowo, regularnie sprawdzaj ciśnienie w oponach, ponieważ niedodatkowe ciśnienie może prowadzić do większego oporu i zwiększonego zużycia paliwa.\n' +
                        '\n' +
                        'Odpowiednie utrzymanie pojazdu również odgrywa kluczową rolę. Regularne przeglądy techniczne, wymiana filtrów powietrza i oleju mogą znacząco poprawić efektywność spalania. Przemyślane nawyki podczas tankowania, takie jak wybór odpowiedniej jakości paliwa, również mogą przyczynić się do oszczędności.'
                },
                {
                    id: 2,
                    title: 'Bezpieczna Jazda: Kluczowe Zasady Dla Ochrony Siebie i Innych Na Drodze',
                    content: 'Bezpieczeństwo na drodze jest priorytetem, który każdy kierowca powinien mieć na uwadze. Przestrzeganie kilku kluczowych zasad może znacząco zmniejszyć ryzyko wypadków i zwiększyć ogólne bezpieczeństwo na drodze.\n' +
                        '\n' +
                        'Pamiętaj o zachowaniu bezpiecznej odległości między pojazdami, zwłaszcza podczas jazdy z dużą prędkością. Przestrzegaj ograniczeń prędkości, a także unikaj używania telefonu komórkowego podczas prowadzenia. Zawsze zapięty pas bezpieczeństwa to absolutna konieczność.\n' +
                        '\n' +
                        'Odpowiedzialne zachowanie na drodze nie tylko chroni Ciebie, ale także innych uczestników ruchu. Pamiętaj, że bezpieczeństwo jest wspólnym obowiązkiem.',
                },
                {
                    id: 3,
                    title: 'Technologiczne Wspomaganie Oszczędzania Paliwa: Inteligentne Rozwiązania Dla Twojego Pojazdu',
                    content: 'Nowoczesne technologie oferują kierowcom liczne rozwiązania wspomagające oszczędne korzystanie z paliwa. Inteligentne systemy monitorowania jazdy, tempomaty adaptacyjne i systemy zarządzania energią są obecnie standardowym wyposażeniem wielu pojazdów.\n' +
                        '\n' +
                        'Dzięki tym rozwiązaniom kierowcy mogą świadomie zarządzać zużyciem paliwa. Systemy te często dostosowują prędkość, kontrolują pracę silnika i optymalizują inne parametry pojazdu, zapewniając oszczędne i efektywne spalanie.',
                },
                {
                    id: 4,
                    title: 'Oszczędzaj Paliwo i Czas: Korzyści Z Praktykowania Carpoolingu',
                    content: 'Carpooling, czyli dzielenie się samochodem z innymi pasażerami, to nie tylko ekonomiczna alternatywa, ale również zrównoważony sposób podróżowania. Dzięki carpoolingowi można nie tylko oszczędzać na paliwie, ale także zmniejszać emisję CO2.\n' +
                        '\n' +
                        'Zanim zdecydujesz się na carpooling, upewnij się, że znasz swoich potencjalnych współpasażerów i ustalcie zasady podróżowania. Dzięki tej praktyce nie tylko zaoszczędzisz, ale także uczestniczysz w tworzeniu bardziej przyjaznego dla środowiska społeczeństwa.',
                },
                {
                    id: 5,
                    title: 'Bezpieczne Jazda Zimą: Jak Oszczędzać Paliwo i Unikać Niebezpieczeństw',
                    content: 'Zimowe warunki mogą stanowić wyzwanie dla kierowców, ale odpowiednie przygotowanie i przemyślane nawyki jazdy mogą znacznie poprawić bezpieczeństwo i efektywność spalania.\n' +
                        '\n' +
                        'Przed sezonem zimowym sprawdź stan opon, wymień płyny eksploatacyjne i przetestuj systemy hamulcowe. Podczas jazdy utrzymuj umiarkowaną prędkość, zachowuj ostrożność i unikaj gwałtownych manewrów.\n' +
                        '\n' +
                        'Odpowiednie przygotowanie pojazdu i przemyślane zachowanie na drodze to klucz do bezpiecznej i efektywnej jazdy nawet w trudnych warunkach zimowych.',
                },
                // Dodaj inne artykuły i porady według potrzeb
            ],
        };
    },
};
</script>
