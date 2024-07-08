@extends('layouts.contentNavbarLayout')

@section('title', 'List of Zone Prices')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-end mb-3">
            <a href="{{ route('zone-prices.create') }}" class="btn btn-success">Add Zone Price</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Zone Prices</h5>
                <div class="table-responsive text-nowrap">
                    @if ($zonePrices->isEmpty())
                        <p class="text-center mt-3">No zone prices available!</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pickup Zone</th>
                                    <th>Delivery Zone</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zonePrices as $zonePrice)
                                    <tr>
                                        <td>{{ $zonePrice->id }}</td>
                                        <td>{{ $zonePrice->pickupZone->name }}</td>
                                        <td>{{ $zonePrice->deliveryZone->name }}</td>
                                        <td>${{ number_format($zonePrice->price, 2) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('zone-prices.show', $zonePrice->id) }}" class="dropdown-item">
                                                        <i class="mdi mdi-eye-outline me-1"></i> View
                                                    </a>
                                                    <a href="{{ route('zone-prices.edit', $zonePrice->id) }}" class="dropdown-item">
                                                        <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                    </a>
                                                    <form action="{{ route('zone-prices.destroy', $zonePrice->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this zone price?')">
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
