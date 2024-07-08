@extends('layouts.contentNavbarLayout')

@section('title', 'Parcel Statuses')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="text-end mb-3">
                <a href="{{ route('parcel_status.create') }}" class="btn btn-success">Add Parcel Status</a>
            </div>

            <div class="card">
                <h5 class="card-header">Parcel Status Table</h5>
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
                            @foreach($parcelStatuses as $parcelStatus)
                            <tr>
                                <td>{{ $parcelStatus->id }}</td>
                                <td>{{ $parcelStatus->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('parcel_status.show', $parcelStatus) }}" class="dropdown-item">
                                                <i class="mdi mdi-eye-outline me-1"></i> View
                                            </a>
                                            <a href="{{ route('parcel_status.edit', $parcelStatus) }}" class="dropdown-item">
                                                <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('parcel_status.destroy', $parcelStatus) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this parcel status?')">
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
