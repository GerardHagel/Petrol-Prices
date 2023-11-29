<form action="{{ route('fuel-stations.search') }}" method="post">
    @csrf
    <label for="location">Lokalizacja:</label>
    <input type="text" name="location" id="location">

    <label for="fuel_type">Rodzaj Paliwa:</label>
    <input type="text" name="fuel_type" id="fuel_type">

    <!-- Dodaj inne pola formularza według potrzeb -->

    <button type="submit">Szukaj</button>
</form>
