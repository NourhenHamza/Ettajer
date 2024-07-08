@extends('layouts.contentNavbarLayout')

@section('title', 'Create Currency')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Create /</span> Currency</h4>

    <div class="card">
        <h5 class="card-header">Creation Form</h5>
        <div class="card-body">
            <form action="{{ route('currencies.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="iso_code" class="form-label">ISO Code</label>
                    <input type="text" class="form-control" id="iso_code" name="iso_code" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Default Currency</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="default_currency" name="default_currency" value="1">
                        <label class="form-check-label" for="default_currency">Default</label>
                    </div>
                </div>

                <div class="mb-3" id="exchange_rate_field">
                    <label for="exchange_rate" class="form-label">Exchange Rate</label>
                    <input type="number" step="any" class="form-control" id="exchange_rate" name="exchange_rate">
                </div>

                <div class="mb-3">
                    <label for="decimals" class="form-label">Decimals</label>
                    <input type="number" class="form-control" id="decimals" name="decimals" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="symbol" class="form-label">Symbol</label>
                    <input type="text" class="form-control" id="symbol" name="symbol" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Currency</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const defaultCurrencyCheckbox = document.getElementById('default_currency');
            const exchangeRateField = document.getElementById('exchange_rate_field');

            defaultCurrencyCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    exchangeRateField.style.display = 'none';
                } else {
                    exchangeRateField.style.display = 'block';
                }
            });

            // Initial state based on checkbox
            if (defaultCurrencyCheckbox.checked) {
                exchangeRateField.style.display = 'none';
            } else {
                exchangeRateField.style.display = 'block';
            }
        });
    </script>
@endsection
