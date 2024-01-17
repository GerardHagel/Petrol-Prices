@extends('layouts.app')

@section('content')
    <h2>Add Fuel Station</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fuel_stations.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fuel_type">Fuel Type:</label>
            <input type="text" name="fuel_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="opening_hours">Opening Hours:</label>
            <input type="text" name="opening_hours" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Fuel Station</button>
    </form>
@endsection
