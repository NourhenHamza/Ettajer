@extends('layouts.contentNavbarLayout')

@section('title', 'Modify Tax Category')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Modify Tax Category</h5>
                <div class="card-body">
                    <form action="{{ route('taxcategories.update', $taxCategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $taxCategory->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Active</label>
                            <select class="form-select" id="is_active" name="is_active">
                                <option value="1" {{ $taxCategory->is_active ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$taxCategory->is_active ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type">
                                <option value="fix" {{ $taxCategory->type == 'fix' ? 'selected' : '' }}>Fixed</option>
                                <option value="pourcentage" {{ $taxCategory->type == 'pourcentage' ? 'selected' : '' }}>Percentage</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('taxcategories.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
