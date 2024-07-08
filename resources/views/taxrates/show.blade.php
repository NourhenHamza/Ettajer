@extends('layouts.contentNavbarLayout')

@section('title', 'View Tax Rate')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Tax Rate Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <p>{{ $taxRate->id }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <p>{{ $taxRate->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tax Category</label>
                        <p>{{ $taxRate->taxCategory->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rate</label>
                        <p>{{ $taxRate->rate }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Active</label>
                        <p>{{ $taxRate->is_active ? 'Yes' : 'No' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Valid From</label>
                        <p>{{ $taxRate->valid_from ? $taxRate->valid_from->format('Y-m-d') : 'N/A' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Valid Until</label>
                        <p>{{ $taxRate->valid_until ? $taxRate->valid_until->format('Y-m-d') : 'N/A' }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('taxrates.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
