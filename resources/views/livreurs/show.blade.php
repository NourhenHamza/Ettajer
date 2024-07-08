@extends('layouts.contentNavbarLayout')

@section('title', 'Courier Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mb-3">
                <h5 class="card-header">Courier Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <p>{{ $livreur->id }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <p>{{ $livreur->nom }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <p>{{ $livreur->prenom }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <p>{{ $livreur->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <p>{{ $livreur->telephone }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vehicle Type</label>
                        <p>{{ $livreur->typeVehicule->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Delivery Route</label>
                        <p>
                            @if($livreur->deliveryRoute)
                                {{ implode(', ', explode(',', $livreur->deliveryRoute->cities)) }}
                            @else
                                No route assigned
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('livreurs.edit', $livreur->id) }}" class="btn btn-primary me-2">Edit Courier</a>
                <a href="{{ route('livreurs.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
