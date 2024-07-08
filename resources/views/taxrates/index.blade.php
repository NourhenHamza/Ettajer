@extends('layouts.contentNavbarLayout')

@section('title', 'List of Tax Rates')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="text-end mb-3">
                <a href="{{ route('taxrates.create') }}" class="btn btn-success">Add Tax Rate</a>
            </div>

            <!-- Search Form -->
            <div class="d-flex justify-content-start mb-3">
                <form id="globalSearchForm" action="{{ route('search') }}" method="GET" class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">
                        <i class="mdi mdi-magnify mdi-24px lh-0"></i>
                        <input id="queryInput" type="text" name="query" class="form-control border-0 shadow-none bg-body" placeholder="Search tax rates..." aria-label="Search tax rates...">
                        <input type="hidden" id="searchType" name="type" value="taxrate"> <!-- Valeur par défaut -->
                    </div>
                </form>
            </div>
            <!-- /Search Form -->

            <div class="card">
                <h5 class="card-header">Tax Rates Table</h5>
                <div class="table-responsive text-nowrap">
                    @if ($taxRates->isEmpty())
                        <p class="text-center mt-3">No tax rates available!</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Tax Category</th>
                                    <th>Rate</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($taxRates as $rate)
                                    <tr>
                                        <td>{{ $rate->id }}</td>
                                        <td>{{ $rate->name }}</td>
                                        <td>{{ $rate->taxCategory->name }}</td>
                                        <td>{{ $rate->rate }}</td>
                                        <td>{{ $rate->is_active ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('taxrates.show', $rate) }}" class="dropdown-item">
                                                        <i class="mdi mdi-eye-outline me-1"></i> View
                                                    </a>
                                                    <a href="{{ route('taxrates.edit', $rate) }}" class="dropdown-item">
                                                        <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                    </a>
                                                    <form action="{{ route('taxrates.destroy', $rate) }}" method="post" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this tax rate?')">
                                                            <i class="mdi mdi-trash-can-outline me-1"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
