<h2>Aktualne ceny paliw</h2>
<ul>
    @foreach($currentPrices as $price)
        <li>{{ $price->fuel_type }}: {{ $price->price }} zł ({{ $price->date }})</li>
    @endforeach
</ul>

<h2>Historyczne ceny paliw</h2>
<ul>
    @foreach($historicalPrices as $price)
        <li>{{ $price->fuel_type }}: {{ $price->price }} zł ({{ $price->date }})</li>
    @endforeach
</ul>
