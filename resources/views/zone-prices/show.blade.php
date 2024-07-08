@extends('layouts.contentNavbarLayout')

@section('title', 'View Zone Price')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Zone Price Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>ID:</strong> {{ $zonePrice->id }}
                    </div>
                    <div class="mb-3">
                        <strong>Pickup Zone:</strong> {{ $zonePrice->pickupZone->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Delivery Zone:</strong> {{ $zonePrice->deliveryZone->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Price:</strong> ${{ number_format($zonePrice->price, 2) }}
                    </div>
                    <a href="{{ route('zone-prices.index') }}" class="btn btn-secondary">Back to Zone Prices</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
