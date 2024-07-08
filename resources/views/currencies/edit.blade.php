@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Currency')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Edit /</span> Currency</h4>

    <div class="card">
        <h5 class="card-header">Edit Currency</h5>
        <div class="card-body">
            <form action="{{ route('currencies.update', $currency->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $currency->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="iso_code" class="form-label">ISO Code</label>
                    <input type="text" class="form-control" id="iso_code" name="iso_code" value="{{ $currency->iso_code }}" required>
                </div>

                <div class="mb-3">
                    <label for="exchange_rate" class="form-label">Exchange Rate</label>
                    <input type="number" step="any" class="form-control" id="exchange_rate" name="exchange_rate" value="{{ $currency->exchange_rate }}" required>
                </div>

                <div class="mb-3">
                    <label for="decimals" class="form-label">Decimals</label>
                    <input type="number" class="form-control" id="decimals" name="decimals" value="{{ $currency->decimals }}" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="active" {{ $currency->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $currency->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="symbol" class="form-label">Symbol</label>
                    <input type="text" class="form-control" id="symbol" name="symbol" value="{{ $currency->symbol }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Currency</button>
            </form>
        </div>
    </div>
@endsection
