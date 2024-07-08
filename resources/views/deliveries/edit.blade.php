@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Delivery')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12 text-left">
            <a href="{{ route('deliveries.index') }}" class="btn btn-secondary">Back to Deliveries</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Pickup Address</h5>
                <div class="card-body">
                    <form id="deliveryForm" action="{{ route('deliveries.update', $delivery->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="pickup_recipient_name" class="form-label">Recipient Name</label>
                            <input type="text" class="form-control" id="pickup_recipient_name" name="pickup_recipient_name" value="{{ old('pickup_recipient_name', $delivery->pickupAddress->recipient_name ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="pickup_phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="pickup_phone_number" name="pickup_phone_number" value="{{ old('pickup_phone_number', $delivery->pickupAddress->phone_number ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="pickup_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="pickup_address" name="pickup_address" value="{{ old('pickup_address', $delivery->pickupAddress->address ?? '') }}" required>
                        </div>
                </div>
            </div>

            <div class="card mb-4">
                <h5 class="card-header">Delivery Address</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="delivery_recipient_name" class="form-label">Recipient Name</label>
                        <input type="text" class="form-control" id="delivery_recipient_name" name="delivery_recipient_name" value="{{ old('delivery_recipient_name', $delivery->deliveryAddress->recipient_name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="delivery_phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="delivery_phone_number" name="delivery_phone_number" value="{{ old('delivery_phone_number', $delivery->deliveryAddress->phone_number ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="delivery_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="delivery_address" name="delivery_address" value="{{ old('delivery_address', $delivery->deliveryAddress->address ?? '') }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">Parcel</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="parcel_status_id" class="form-label">Parcel Status</label>
                                <select class="form-select" id="parcel_status_id" name="parcel_status_id" required>
                                    @foreach($parcelStatuses as $status)
                                        <option value="{{ $status->id }}" {{ $delivery->parcel->parcel_status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_material_id" class="form-label">Product Material</label>
                                <select class="form-select" id="product_material_id" name="product_material_id" required>
                                    @foreach($productMaterials as $material)
                                        <option value="{{ $material->id }}" {{ $delivery->parcel->product_material_id == $material->id ? 'selected' : '' }}>{{ $material->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $delivery->parcel->price) }}" placeholder="100" aria-label="Amount (to the nearest dollar)" required>
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="number" class="form-control" id="weight" name="weight" value="{{ old('weight', $delivery->parcel->weight) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="height" class="form-label">Height</label>
                                <input type="number" class="form-control" id="height" name="height" value="{{ old('height', $delivery->parcel->height) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="depth" class="form-label">Depth</label>
                                <input type="number" class="form-control" id="depth" name="depth" value="{{ old('depth', $delivery->parcel->depth) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="width" class="form-label">Width</label>
                                <input type="number" class="form-control" id="width" name="width" value="{{ old('width', $delivery->parcel->width) }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">Delivery Type</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="delivery_type_id" class="form-label">Delivery Type</label>
                                <select class="form-select" id="delivery_type_id" name="delivery_type_id" required>
                                    @foreach($deliveryTypes as $type)
                                        <option value="{{ $type->id }}" {{ $delivery->delivery_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <button type="submit" form="deliveryForm" class="btn btn-primary btn-lg">Update Delivery</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
