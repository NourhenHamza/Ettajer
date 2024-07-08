@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Parcel Status')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Edit Parcel Status</h5>
                <div class="card-body">
                    <form action="{{ route('parcel_status.update', $parcelStatus) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $parcelStatus->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $parcelStatus->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Parcel Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
