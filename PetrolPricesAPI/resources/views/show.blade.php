@extends('layouts.app')

@section('content')
    <div id="app">
        <fuel-station-search></fuel-station-search>
        <fuel-station-info
            :current-prices="{{ json_encode($currentPrices) }}"
            :historical-prices="{{ json_encode($historicalPrices) }}"
        ></fuel-station-info>
    </div>

    <div id="fuel-types-info">
        <fuel-types-info></fuel-types-info>
    </div>

    <div id="fuel-saving-tips">
        <fuel-saving-tips></fuel-saving-tips>
    </div>



    @include('searchResults')

    <script src="{{ mix('js/app.js') }}"></script>
@endsection
