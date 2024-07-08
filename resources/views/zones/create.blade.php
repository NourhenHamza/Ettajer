@extends('layouts.contentNavbarLayout')

@section('title', 'Create Zone')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-10 mx-auto">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Zone</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('zones.store') }}" method="POST">
                        @csrf
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Zone Name" required />
                            <label for="name">Zone Name</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control" id="city" placeholder="Enter a city" />
                                <button class="btn btn-outline-secondary" type="button" id="addCityButton">+</button>
                            </div>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="cities" name="cities" placeholder="Cities" readonly />
                            <label for="cities">Cities</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('zones.index') }}" class="btn btn-secondary">Back to List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('addCityButton').addEventListener('click', function() {
    const cityInput = document.getElementById('city');
    const citiesInput = document.getElementById('cities');
    const city = cityInput.value.trim();

    if (city) {
        let currentCities = citiesInput.value ? citiesInput.value.split(',') : [];
        currentCities.push(city);
        citiesInput.value = currentCities.join(',');

        cityInput.value = '';
    }
});
</script>
@endsection
