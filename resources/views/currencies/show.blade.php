@extends('layouts.contentNavbarLayout')

@section('title', 'Currency Details')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Details /</span> Currency</h4>

    <div class="card">
        <h5 class="card-header">Currency Details</h5>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <p>{{ $currency->name }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">ISO Code</label>
                <p>{{ $currency->iso_code }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Exchange Rate</label>
                <p>{{ $currency->exchange_rate }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Decimals</label>
                <p>{{ $currency->decimals }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <p>{{ $currency->status }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Symbol</label>
                <p>{{ $currency->symbol }}</p>
            </div>

            <a href="{{ route('currencies.edit', $currency->id) }}" class="btn btn-primary">Edit Currency</a>
            <a href="{{ route('currencies.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
