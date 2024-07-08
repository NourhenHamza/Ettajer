@extends('layouts.contentNavbarLayout')

@section('title', 'Vehicle Type Management')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <!-- Search Form -->
            <div class="d-flex justify-content-start mb-3">
                <form id="globalSearchForm" action="{{ route('search') }}" method="GET" class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">
                        <i class="mdi mdi-magnify mdi-24px lh-0"></i>
                        <input id="queryInput" type="text" name="query" class="form-control border-0 shadow-none bg-body" placeholder="Search vehicle types..." aria-label="Search vehicle types...">
                        <input type="hidden" id="searchType" name="type" value="typevehicule"> <!-- Default value -->
                    </div>
                </form>
            </div>
            <!-- /Search Form -->

            <div class="text-end mb-3">
                <a href="{{ route('typevehicules.create') }}" class="btn btn-success">Add Vehicle Type</a>
            </div>

            <div class="card">
                <h5 class="card-header">Vehicle Type Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($typeVehicules as $typeVehicule)
                            <tr>
                                <td>{{ $typeVehicule->id }}</td>
                                <td>{{ $typeVehicule->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('typevehicules.edit', $typeVehicule->id) }}" class="dropdown-item">
                                                <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('typevehicules.destroy', $typeVehicule->id) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this vehicle type?')">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
