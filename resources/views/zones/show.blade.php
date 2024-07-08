@extends('layouts.contentNavbarLayout')

@section('title', 'Zone Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-10 mx-auto">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Zone Details</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <p>{{ $zone->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cities</label>
                        <p>{{ implode(', ', explode(',', $zone->cities)) }}</p>
                    </div>
                    <a href="{{ route('zones.edit', $zone->id) }}" class="btn btn-primary">Edit Zone</a>
                    <a href="{{ route('zones.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
