@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Language')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">Edit Language</h5>
                <div class="card-body">
                    <form action="{{ route('languages.update', $language->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="code" class="form-label">ISO Code:</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $language->code) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $language->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="native_name" class="form-label">Native Name:</label>
                            <input type="text" class="form-control" id="native_name" name="native_name" value="{{ old('native_name', $language->native_name) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('languages.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
