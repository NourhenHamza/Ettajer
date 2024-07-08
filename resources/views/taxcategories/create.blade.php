@extends('layouts.contentNavbarLayout')

@section('title', 'Create Tax Category')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <h5 class="card-header">Create a New Tax Category</h5>
                <div class="card-body">
                    <form action="{{ route('taxcategories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Active</label>
                            <select class="form-select" id="is_active" name="is_active">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type">
                                <option value="fix">Fixed</option>
                                <option value="percentage">Percentage</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('taxcategories.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
