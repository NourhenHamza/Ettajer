@extends('layouts.contentNavbarLayout')

@section('title', 'Currency Management')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <!-- Search Form -->
            <div class="d-flex justify-content-start mb-3">
                <form id="globalSearchForm" action="{{ route('search') }}" method="GET" class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">
                        <i class="mdi mdi-magnify mdi-24px lh-0"></i>
                        <input id="queryInput" type="text" name="query" class="form-control border-0 shadow-none bg-body" placeholder="Search currencies..." aria-label="Search currencies...">
                        <input type="hidden" id="searchType" name="type" value="currency"> <!-- Valeur par défaut -->
                    </div>
                </form>
            </div>
            <!-- /Search Form -->

            <div class="text-end mb-3">
                <a href="{{ route('currencies.create') }}" class="btn btn-success">Add Currency</a>
            </div>

            <div class="card">
                <h5 class="card-header">Currency Table</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>ISO Code</th>
                                <th>Exchange Rate</th>
                                <th>Decimals</th>
                                <th>Status</th>
                                <th>Symbol</th>
                                <th>Default</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($currencies as $currency)
                            <tr>
                                <td>{{ $currency->id }}</td>
                                <td>{{ $currency->name }}</td>
                                <td>{{ $currency->iso_code }}</td>
                                <td>{{ $currency->exchange_rate }}</td>
                                <td>{{ $currency->decimals }}</td>
                                <td>{{ $currency->status }}</td>
                                <td>{{ $currency->symbol }}</td>
                                <td>
                                    <form action="{{ route('currencies.update.default', $currency->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Utiliser la méthode PUT ici -->
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="defaultSwitch{{ $currency->id }}" name="default" {{ $currency->is_default ? 'checked' : '' }} onchange="this.form.submit()">
                                            <label class="form-check-label" for="defaultSwitch{{ $currency->id }}">Default</label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('currencies.show', $currency) }}" class="dropdown-item">
                                                <i class="mdi mdi-eye-outline me-1"></i> View
                                            </a>
                                            <a href="{{ route('currencies.edit', $currency) }}" class="dropdown-item">
                                                <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('currencies.destroy', $currency) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this currency?')">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
