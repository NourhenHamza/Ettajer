@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Customer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card">
                <h5 class="card-header">Edit Customer</h5>
                <div class="card-body">
                      <form action="{{ route('customers.update', $customer) }}" method="post">

                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="type" class="form-label">Customer Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="individual" {{ $customer->type === 'individual' ? 'selected' : '' }}>Individual</option>
                                <option value="organization" {{ $customer->type === 'organization' ? 'selected' : '' }}>Organization</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}">
                        </div>

                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $customer->firstname }}">
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $customer->lastname }}">
                        </div>

                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $customer->company_name }}">
                        </div>

                        <div class="mb-3">
                            <label for="tax_nr" class="form-label">Tax/VAT Number</label>
                            <input type="text" class="form-control" id="tax_nr" name="tax_nr" value="{{ $customer->tax_nr }}">
                        </div>

                        <div class="mb-3">
                            <label for="registration_nr" class="form-label">Company/Trade Registration Number</label>
                            <input type="text" class="form-control" id="registration_nr" name="registration_nr" value="{{ $customer->registration_nr }}">
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ $customer->website }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Customer</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
