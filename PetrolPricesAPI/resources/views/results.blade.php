@if(count($fuelStations) > 0)
    <ul>
        @foreach($fuelStations as $station)
            <li>
                <strong>Nazwa:</strong> {{ $station->name }} <br>
                <strong>Lokalizacja:</strong> {{ $station->location }} <br>
                <strong>Rodzaj Paliwa:</strong> {{ $station->fuel_type }} <br>
                <!-- Dodaj inne pola wynikowe według potrzeb -->
            </li>
        @endforeach
    </ul>
@else
    <p>Brak wyników wyszukiwania.</p>
@endif
