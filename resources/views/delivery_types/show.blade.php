@extends('layouts.contentNavbarLayout')

@section('title', 'Delivery Type Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Delivery Type Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <p>{{ $deliveryType->id }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <p>{{ $deliveryType->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Created At</label>
                        <p>{{ $deliveryType->created_at }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Updated At</label>
                        <p>{{ $deliveryType->updated_at }}</p>
                    </div>

                    <a href="{{ route('delivery_type.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
