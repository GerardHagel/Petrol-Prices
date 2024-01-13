<h2>Fuel Stations</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('fuel_stations.create') }}" class="btn btn-primary">Add Fuel Station</a>

<table class="table mt-3">
    <thead>
    <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Fuel Type</th>
        <th>Price</th>
        <th>Opening Hours</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fuelStations as $fuelStation)
        <tr>
            <td>{{ $fuelStation->name }}</td>
            <td>{{ $fuelStation->location }}</td>
            <td>{{ $fuelStation->fuel_type }}</td>
            <td>{{ $fuelStation->price }}</td>
            <td>{{ $fuelStation->opening_hours }}</td>
            <td>
                <a href="{{ route('fuel_stations.edit', $fuelStation->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('fuel_stations.destroy', $fuelStation->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
