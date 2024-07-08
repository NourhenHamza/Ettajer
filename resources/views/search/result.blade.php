@extends('layouts.contentNavbarLayout') <!-- Assurez-vous que votre layout est correct -->

@section('title', 'Search Results')

@section('content')
<div class="container">
    <h2>Search Results for "{{ $query }}"</h2>

    @if (empty($results['languages']) && empty($results['livreurs']))
        <p>No results found.</p>
    @else
        @if (!empty($results['languages']))
            <h3>Languages</h3>
            <ul>
                @foreach ($results['languages'] as $language)
                    <li>{{ $language->name }} - {{ $language->native_name }}</li>
                @endforeach
            </ul>
        @endif

        @if (!empty($results['livreurs']))
            <h3>Livreurs</h3>
            <ul>
                @foreach ($results['livreurs'] as $livreur)
                    <li>{{ $livreur->nom }} {{ $livreur->prenom }} - {{ $livreur->email }}</li>
                @endforeach
            </ul>
        @endif
    @endif
</div>
@endsection
