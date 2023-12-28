@extends('layouts.app')

@section('content')
    <div id="app">
        <fuel-station-search></fuel-station-search>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
@endsection
