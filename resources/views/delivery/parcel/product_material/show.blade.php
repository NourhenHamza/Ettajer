@extends('layouts.contentNavbarLayout')

@section('title', 'Product Material Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card">
                <h5 class="card-header">Product Material Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <p>{{ $productMaterial->id }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <p>{{ $productMaterial->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <p>{{ $productMaterial->description }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Created At</label>
                        <p>{{ $productMaterial->created_at }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Updated At</label>
                        <p>{{ $productMaterial->updated_at }}</p>
                    </div>

                    <a href="{{ route('product_material.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
