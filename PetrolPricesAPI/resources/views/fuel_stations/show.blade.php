@extends('layouts.app')

@section('content')
    <div id="app">
        <fuel-station-info
            :current-prices="{{ json_encode($currentPrices) }}"
            :historical-prices="{{ json_encode($historicalPrices) }}"
        ></fuel-station-info>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
@endsection
