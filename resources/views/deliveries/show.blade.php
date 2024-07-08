@extends('layouts.contentNavbarLayout')

@section('title', 'Delivery Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-3">
                <h5 class="card-header">Delivery Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <p>{{ $delivery->id }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Created At</label>
                        <p>{{ $delivery->created_at }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Updated At</label>
                        <p>{{ $delivery->updated_at }}</p>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <h5 class="card-header">Pickup Address</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Recipient Name</label>
                        <p>{{ $delivery->pickupAddress->recipient_name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <p>{{ $delivery->pickupAddress->phone_number }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <p>{{ $delivery->pickupAddress->address }}</p>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <h5 class="card-header">Delivery Address</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Recipient Name</label>
                        <p>{{ $delivery->deliveryAddress->recipient_name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <p>{{ $delivery->deliveryAddress->phone_number }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <p>{{ $delivery->deliveryAddress->address }}</p>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <h5 class="card-header">Parcel Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Parcel ID</label>
                        <p>{{ $delivery->parcel->id }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Weight</label>
                        <p>{{ $delivery->parcel->weight }} kg</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Height</label>
                        <p>{{ $delivery->parcel->height }} cm</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Depth</label>
                        <p>{{ $delivery->parcel->depth }} cm</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Width</label>
                        <p>{{ $delivery->parcel->width }} cm</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parcel Status</label>
                        <p>{{ $delivery->parcel->parcelStatus->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Material</label>
                        <p>{{ $delivery->parcel->productMaterial->name }}</p>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <h5 class="card-header">Delivery Type</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <p>{{ $delivery->deliveryType->name }}</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('deliveries.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
