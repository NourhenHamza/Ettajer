@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Product Material')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Edit Product Material</h5>
                <div class="card-body">
                    <form action="{{ route('product_material.update', $productMaterial) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $productMaterial->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $productMaterial->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product Material</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
