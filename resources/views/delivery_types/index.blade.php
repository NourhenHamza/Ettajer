@extends('layouts.contentNavbarLayout')

@section('title', 'Delivery Types')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="text-end mb-3">
                <a href="{{ route('delivery_type.create') }}" class="btn btn-success">Add Delivery Type</a>
            </div>

            <div class="card">
                <h5 class="card-header">Delivery Types Table</h5>
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
                            @foreach($deliveryTypes as $deliveryType)
                            <tr>
                                <td>{{ $deliveryType->id }}</td>
                                <td>{{ $deliveryType->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('delivery_type.show', $deliveryType) }}" class="dropdown-item">
                                                <i class="mdi mdi-eye-outline me-1"></i> View
                                            </a>
                                            <a href="{{ route('delivery_type.edit', $deliveryType) }}" class="dropdown-item">
                                                <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('delivery_type.destroy', $deliveryType) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this delivery type?')">
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
