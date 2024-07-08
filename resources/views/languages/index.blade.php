@extends('layouts.contentNavbarLayout')

@section('title', __('messages.list_of_languages'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <!-- Search Form -->
            <div class="d-flex justify-content-start mb-3">
                <form id="globalSearchForm" action="{{ route('search') }}" method="GET" class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center">
                        <i class="mdi mdi-magnify mdi-24px lh-0"></i>
                        <input id="queryInput" type="text" name="query" class="form-control border-0 shadow-none bg-body" placeholder="Search languages..." aria-label="Search languages...">
                        <input type="hidden" id="searchType" name="type" value="language"> <!-- Valeur par défaut -->
                    </div>
                </form>
            </div>
            <!-- /Search Form -->

            <div class="text-end mb-3">
                <a href="{{ route('languages.create') }}" class="btn btn-success">{{ __('messages.add_language') }}</a>
            </div>

            <div class="card">
                <h5 class="card-header">{{ __('messages.languages_table') }}</h5>
                <div class="table-responsive">
                    @if ($languages->isEmpty())
                        <p class="text-center mt-3">{{ __('messages.no_languages_available') }}</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.iso_code') }}</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>{{ __('messages.native_name') }}</th>
                                    <th>{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($languages as $language)
                                    <tr>
                                        <td>{{ $language->code }}</td>
                                        <td>{{ $language->name }}</td>
                                        <td>{{ $language->native_name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('languages.edit', $language) }}" class="dropdown-item">
                                                        <i class="mdi mdi-pencil-outline me-1"></i> {{ __('messages.edit') }}
                                                    </a>
                                                    <form action="{{ route('languages.destroy', $language) }}" method="post" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('{{ __('messages.delete_confirmation') }}')">
                                                            <i class="mdi mdi-trash-can-outline me-1"></i> {{ __('messages.delete') }}
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


//livreur travaill sur plusieur zone