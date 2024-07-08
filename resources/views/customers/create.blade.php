@extends('layouts.contentNavbarLayout')

@section('title', 'Add New Customer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card">
                <h5 class="card-header">Add New Customer</h5>
                <div class="card-body">
                    <form action="{{ route('customers.store') }}" method="post">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="type" class="form-label">Customer Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="individual">Individual</option>
                                <option value="organization">Organization</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>

                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname">
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname">
                        </div>

                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name">
                        </div>

                        <div class="mb-3">
                            <label for="tax_nr" class="form-label">Tax/VAT Number</label>
                            <input type="text" class="form-control" id="tax_nr" name="tax_nr">
                        </div>

                        <div class="mb-3">
                            <label for="registration_nr" class="form-label">Company/Trade Registration Number</label>
                            <input type="text" class="form-control" id="registration_nr" name="registration_nr">
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" class="form-control" id="website" name="website">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Customer</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
