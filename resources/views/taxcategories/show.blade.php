@extends('layouts.contentNavbarLayout')

@section('title', 'Tax Category Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Tax Category Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <p>{{ $taxCategory->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="is_active" class="form-label">Active</label>
                        <p>{{ $taxCategory->is_active ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <p>{{ $taxCategory->type == 'fix' ? 'Fixed' : 'Percentage' }}</p>
                    </div>
                    <a href="{{ route('taxcategories.edit', $taxCategory->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('taxcategories.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
