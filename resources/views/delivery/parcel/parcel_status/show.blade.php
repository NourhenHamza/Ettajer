@extends('layouts.contentNavbarLayout')

@section('title', 'Parcel Status Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card">
                <h5 class="card-header">Parcel Status Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <p>{{ $parcelStatus->id }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <p>{{ $parcelStatus->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Created At</label>
                        <p>{{ $parcelStatus->created_at }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Updated At</label>
                        <p>{{ $parcelStatus->updated_at }}</p>
                    </div>

                    <a href="{{ route('parcel_status.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
