@extends('layouts.contentNavbarLayout')

@section('title', 'List of Zones')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="text-end mb-3">
                <a href="{{ route('zones.create') }}" class="btn btn-success">Add Zone</a>
            </div>

            <div class="card">
                <h5 class="card-header">Zone Table</h5>
                <div class="table-responsive text-nowrap">
                    @if ($zones->isEmpty())
                        <p class="text-center mt-3">No zones available!</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Cities</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zones as $zone)
                                    <tr>
                                        <td>{{ $zone->id }}</td>
                                        <td>{{ $zone->name }}</td>
                                        <td>{{ implode(', ', explode(',', $zone->cities)) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('zones.show', $zone->id) }}" class="dropdown-item">
                                                        <i class="mdi mdi-eye-outline me-1"></i> View
                                                    </a>
                                                    <a href="{{ route('zones.edit', $zone->id) }}" class="dropdown-item">
                                                        <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                    </a>
                                                    <form action="{{ route('zones.destroy', $zone->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this zone?')">
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
