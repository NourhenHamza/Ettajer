@extends('layouts.contentNavbarLayout')

@section('title', 'Customer Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Customer Details</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Type:</strong> {{ $customer->type }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $customer->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Phone:</strong> {{ $customer->phone }}
                    </div>
                    <div class="mb-3">
                        <strong>First Name:</strong> {{ $customer->firstname }}
                    </div>
                    <div class="mb-3">
                        <strong>Last Name:</strong> {{ $customer->lastname }}
                    </div>
                    <div class="mb-3">
                        <strong>Company Name:</strong> {{ $customer->company_name }}
                    </div>
                    <div class="mb-3">
                        <strong>Tax/VAT Number:</strong> {{ $customer->tax_nr }}
                    </div>
                    <div class="mb-3">
                        <strong>Registration Number:</strong> {{ $customer->registration_nr }}
                    </div>
                    <div class="mb-3">
                        <strong>Website:</strong> {{ $customer->website }}
                    </div>
                    <div class="mb-3">
                        <strong>Status:</strong> {{ $customer->is_active ? 'Active' : 'Inactive' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
