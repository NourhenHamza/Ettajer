@extends('layouts.contentNavbarLayout')

@section('title', 'List of Couriers')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <!-- Search Form -->
            <div class="d-flex justify-content-start mb-3">
                <form id="globalSearchForm" action="{{ route('search') }}" method="GET" class="d-flex align-items-center">
                    <div class="nav-item d-flex align-items-center">
                        <i class="mdi mdi-magnify mdi-24px lh-0"></i>
                        <input id="queryInput" type="text" name="query" class="form-control border-0 shadow-none bg-body me-2" placeholder="Search..." aria-label="Search...">
                    </div>
                    <div class="nav-item d-flex align-items-center">
                        <select id="categorySelect" name="category" class="form-select me-2">
                            <option value="nom">Nom</option>
                            <option value="prenom">Prénom</option>
                            <option value="email">Email</option>
                            <option value="telephone">Téléphone</option>
                            <option value="typeVehicule">Type Véhicule</option>
                            <!-- Ajoutez d'autres options pour d'autres colonnes selon vos besoins -->
                        </select>
                    </div>
                </form>
            </div>
            <!-- /Search Form -->

            <div class="text-end mb-3">
                <a href="{{ route('livreurs.create') }}" class="btn btn-success">Add Courier</a>
            </div>

            <div class="card">
                <h5 class="card-header">Courier Table</h5>
                <div class="table-responsive text-nowrap">
                    @if ($livreurs->isEmpty())
                        <p class="text-center mt-3">No couriers available!</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Vehicle</th>
                                    <th>Route</th> <!-- Route column -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($livreurs as $livreur)
                                    <tr>
                                        <td>{{ $livreur->id }}</td>
                                        <td>{{ $livreur->nom }}</td>
                                        <td>{{ $livreur->prenom }}</td>
                                        <td>{{ $livreur->email }}</td>
                                        <td>{{ $livreur->telephone }}</td>
                                        <td>{{ $livreur->vehicule }}</td>
                                        <td>
                                            @if ($livreur->deliveryRoute)
                                                {{ $livreur->deliveryRoute->cities }}
                                            @else
                                                No route
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('livreurs.show', $livreur->id) }}" class="dropdown-item">
                                                        <i class="mdi mdi-eye-outline me-1"></i> View
                                                    </a>
                                                    <a href="{{ route('livreurs.edit', $livreur->id) }}" class="dropdown-item">
                                                        <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                    </a>
                                                    <form action="{{ route('livreurs.destroy', $livreur->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this courier?')">
                                                            <i class="mdi mdi-trash-can-outline me-1"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('queryInput').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            document.getElementById('globalSearchForm').submit();
        }
    });

    document.getElementById('categorySelect').addEventListener('change', function() {
        document.getElementById('globalSearchForm').submit();
    });
</script>
@endpush
