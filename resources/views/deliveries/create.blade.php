@extends('layouts.contentNavbarLayout')

@section('title', 'Add New Delivery')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12 text-left">
            <a href="{{ route('deliveries.index') }}" class="btn btn-secondary">Back to Deliveries</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Pickup Address</h5>
                <div class="card-body">
                    <form id="deliveryForm" action="{{ route('deliveries.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="pickup_recipient_name" class="form-label">Recipient Name</label>
                            <input type="text" class="form-control" id="pickup_recipient_name" name="pickup_recipient_name" value="{{ old('pickup_recipient_name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="pickup_phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="pickup_phone_number" name="pickup_phone_number" value="{{ old('pickup_phone_number') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="pickup_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="pickup_address" name="pickup_address" value="{{ old('pickup_address') }}" required>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <h5 class="card-header">Delivery Address</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="delivery_recipient_name" class="form-label">Recipient Name</label>
                        <input type="text" class="form-control" id="delivery_recipient_name" name="delivery_recipient_name" value="{{ old('delivery_recipient_name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="delivery_phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="delivery_phone_number" name="delivery_phone_number" value="{{ old('delivery_phone_number') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="delivery_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="delivery_address" name="delivery_address" value="{{ old('delivery_address') }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Parcel</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="parcel_status_id" class="form-label">Parcel Status</label>
                        <select class="form-select" id="parcel_status_id" name="parcel_status_id" required>
                            @foreach($parcelStatuses as $status)
                                <option value="{{ $status->id }}" {{ old('parcel_status_id') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_material_id" class="form-label">Product Material</label>
                        <select class="form-select" id="product_material_id" name="product_material_id" required>
                            @foreach($productMaterials as $material)
                                <option value="{{ $material->id }}" {{ old('product_material_id') == $material->id ? 'selected' : '' }}>{{ $material->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="100" aria-label="Amount (to the nearest dollar)" required>
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="number" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="height" class="form-label">Height</label>
                        <input type="number" class="form-control" id="height" name="height" value="{{ old('height') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="depth" class="form-label">Depth</label>
                        <input type="number" class="form-control" id="depth" name="depth" value="{{ old('depth') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="width" class="form-label">Width</label>
                        <input type="number" class="form-control" id="width" name="width" value="{{ old('width') }}" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <h5 class="card-header">Delivery Type</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="delivery_type_id" class="form-label">Delivery Type</label>
                        <select class="form-select" id="delivery_type_id" name="delivery_type_id" required>
                            @foreach($deliveryTypes as $type)
                                <option value="{{ $type->id }}" {{ old('delivery_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <h5 class="card-header">Courier Man (Livreur)</h5>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="livreur_id" class="form-label">Select Livreur</label>
                        <select class="form-select" id="livreur_id" name="livreur_id" required>
                            @foreach($livreurs as $livreur)
                                <option value="{{ $livreur->id }}" {{ old('livreur_id') == $livreur->id ? 'selected' : '' }}>{{ $livreur->nom }} {{ $livreur->prenom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <button type="submit" form="deliveryForm" class="btn btn-primary btn-lg">Add Delivery</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Fonction pour mettre à jour la liste des livreurs en fonction des adresses de ramassage et de livraison
        function updateLivreurList(pickupAddress, deliveryAddress) {
            // Extraire les villes des adresses
            var pickupCity = extractCity(pickupAddress);
            var deliveryCity = extractCity(deliveryAddress);

            $.ajax({
                url: '{{ route('livreurs.updateList') }}', // Remplacez par la route correcte dans votre application
                type: 'GET',
                dataType: 'json',
                data: {
                    pickup_city: pickupCity,
                    delivery_city: deliveryCity
                },
                success: function(response) {
                    // Clear livreur options
                    $('#livreur_id').empty();

                    // Ajoutez les nouvelles options
                    $.each(response.livreurs, function(index, livreur) {
                        $('#livreur_id').append($('<option>', {
                            value: livreur.id,
                            text: livreur.nom + ' ' + livreur.prenom
                        }));
                    });

                    // Sélectionnez le premier livreur par défaut
                    if (response.livreurs.length > 0) {
                        $('#livreur_id').val(response.livreurs[0].id);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Fonction pour extraire la ville d'une adresse (remplacez cette logique par une vraie extraction de ville)
        function extractCity(address) {
            // Pour cet exemple, nous supposons que l'adresse contient la ville à la fin, séparée par une virgule
            var parts = address.split(',');
            return parts[parts.length - 1].trim();
        }

        // Événements de changement pour les champs de l'adresse de ramassage et de livraison
        $('#pickup_address').on('input', function() {
            var pickupAddress = $(this).val();
            var deliveryAddress = $('#delivery_address').val();
            updateLivreurList(pickupAddress, deliveryAddress);
        });

        $('#delivery_address').on('input', function() {
            var pickupAddress = $('#pickup_address').val();
            var deliveryAddress = $(this).val();
            updateLivreurList(pickupAddress, deliveryAddress);
        });

        // Initialiser la liste des livreurs au chargement de la page
        var initialPickupAddress = $('#pickup_address').val();
        var initialDeliveryAddress = $('#delivery_address').val();
        if (initialPickupAddress && initialDeliveryAddress) {
            updateLivreurList(initialPickupAddress, initialDeliveryAddress);
        }
    });
</script>
@endpush
