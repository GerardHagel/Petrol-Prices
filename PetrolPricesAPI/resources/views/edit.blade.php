@extends('layouts.app')

@section('content')
    <h2>Edit Fuel Station</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fuel_stations.update', $fuelStation->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $fuelStation->name }}" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" value="{{ $fuelStation->location }}" required>
        </div>
        <div class="form-group">
            <label for="fuel_type">Fuel Type:</label>
            <input type="text" name="fuel_type" class="form-control" value="{{ $fuelStation->fuel_type }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" value="{{ $fuelStation->price }}" required>
        </div>
        <div class="form-group">
            <label for="opening_hours">Opening Hours:</label>
            <input type="text" name="opening_hours" class="form-control" value="{{ $fuelStation->opening_hours }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Fuel Station</button>
    </form>
@endsection
