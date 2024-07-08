@extends('layouts.contentNavbarLayout')

@section('title', 'Create Courier')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Create Courier</h4>

<div class="row">
  <div class="col-xl-8 col-lg-10 mx-auto">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Create Courier</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('livreurs.store') }}" method="POST">
          @csrf
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required />
            <label for="nom">Nom</label>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required />
            <label for="prenom">Prénom</label>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
            <label for="email">Email</label>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone" required />
            <label for="telephone">Téléphone</label>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <label for="type_vehicule_id" class="form-label">Vehicle Type</label>
            <select class="form-select" id="type_vehicule_id" name="type_vehicule_id" required>
                @foreach($typeVehicules as $typeVehicule)
                    <option value="{{ $typeVehicule->id }}">{{ $typeVehicule->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <div class="input-group">
              <input type="text" class="form-control" id="city" placeholder="Enter a city" />
              <button class="btn btn-outline-secondary" type="button" id="addCityButton">+</button>
            </div>
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" id="cities" name="cities" placeholder="Delivery Route" readonly />
            <label for="cities">Delivery Route</label>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
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
