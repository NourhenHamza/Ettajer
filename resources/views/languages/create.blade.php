@extends('layouts.contentNavbarLayout')

@section('title', __('messages.add_language'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <h5 class="card-header">{{ __('messages.add_language') }}</h5>
                <div class="card-body">
                    <form action="{{ route('languages.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">{{ __('messages.language') }}:</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('messages.name') }}:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="native_name" class="form-label">{{ __('messages.native_name') }}:</label>
                            <input type="text" class="form-control" id="native_name" name="native_name" value="{{ old('native_name') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                        <a href="{{ route('languages.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
