@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Vehicle Type')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card">
                <h5 class="card-header">Edit Vehicle Type</h5>
                <div class="card-body">
                    <form action="{{ route('typevehicules.update', $typeVehicule->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Vehicle Type Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $typeVehicule->name }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Vehicle Type</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
