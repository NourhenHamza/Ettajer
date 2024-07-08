@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Zone Price')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Edit Zone Price</h5>
                <div class="card-body">
                    <form action="{{ route('zone-prices.update', $zonePrice->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="pickup_zone_id" class="form-label">Pickup Zone</label>
                            <select class="form-select" id="pickup_zone_id" name="pickup_zone_id" required>
                                <option value="">Select Pickup Zone</option>
                                @foreach($zones as $zone)
                                    <option value="{{ $zone->id }}" {{ $zonePrice->pickup_zone_id == $zone->id ? 'selected' : '' }}>
                                        {{ $zone->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="delivery_zone_id" class="form-label">Delivery Zone</label>
                            <select class="form-select" id="delivery_zone_id" name="delivery_zone_id" required>
                                <option value="">Select Delivery Zone</option>
                                @foreach($zones as $zone)
                                    <option value="{{ $zone->id }}" {{ $zonePrice->delivery_zone_id == $zone->id ? 'selected' : '' }}>
                                        {{ $zone->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="price" name="price" placeholder="100.00" aria-label="Price" step="0.01" value="{{ $zonePrice->price }}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Zone Price</button>
                        <a href="{{ route('zone-prices.index') }}" class="btn btn-secondary">Back to Zone Prices</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
