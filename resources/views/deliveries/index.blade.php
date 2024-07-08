@extends('layouts.contentNavbarLayout')

@section('title', 'Deliveries')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="text-end mb-3">
                <a href="{{ route('deliveries.create') }}" class="btn btn-primary">Add New Delivery</a>
            </div>

            <div class="card">
                <h5 class="card-header">Delivery Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pickup Address</th>
                                <th>Delivery Address</th>
                                <th>Parcel Status</th>
                                <th>Delivery Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliveries as $delivery)
                            <tr>
                                <td>{{ $delivery->id }}</td>
                                <td>{{ $delivery->pickupAddress ? $delivery->pickupAddress->address : 'N/A' }}</td>
                                <td>{{ $delivery->deliveryAddress ? $delivery->deliveryAddress->address : 'N/A' }}</td>
                                <td>{{ $delivery->parcel && $delivery->parcel->parcelStatus ? $delivery->parcel->parcelStatus->name : 'N/A' }}</td>
                                <td>{{ $delivery->deliveryType ? $delivery->deliveryType->name : 'N/A' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('deliveries.show', $delivery->id) }}" class="dropdown-item">
                                                <i class="mdi mdi-eye-outline me-1"></i> View
                                            </a>
                                            <a href="{{ route('deliveries.edit', $delivery->id) }}" class="dropdown-item">
                                                <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('deliveries.destroy', $delivery) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this delivery?')">
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
