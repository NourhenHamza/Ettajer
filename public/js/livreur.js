// Function to check if livreur's route matches pickup and delivery addresses in order
function livreurHasRouteInOrder(livreur, pickupAddress, deliveryAddress) {
    // Convert the Livreur's route string into an array of cities
    let route = livreur.route.split(',');

    // Ensure the Pickup Address is present before the Delivery Address in the Livreur's route
    let pickupIndex = route.indexOf(pickupAddress.trim());
    let deliveryIndex = route.indexOf(deliveryAddress.trim());

    return pickupIndex !== -1 && deliveryIndex !== -1 && pickupIndex < deliveryIndex;
}

$(document).ready(function() {
    // Show livreur details when button is clicked
    $('#showLivreurDetails').click(function() {
        var livreurId = $('#livreur_id').val();

        // Fetch livreur details via Ajax
        $.ajax({
            url: '/livreur/' + livreurId, // Replace with your route for fetching livreur details
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Update livreur details in the DOM
                $('#livreurDetails').html(`
                    <p><strong>Nom:</strong> ${response.nom}</p>
                    <p><strong>Prenom:</strong> ${response.prenom}</p>
                    <p><strong>Email:</strong> ${response.email}</p>
                    <p><strong>Telephone:</strong> ${response.telephone}</p>
                    <p><strong>Type Vehicule:</strong> ${response.type_vehicule}</p>
                `);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error here
            }
        });
    });

    // Example: Validate livreur selection based on pickup and delivery addresses
    $('#livreur_id').change(function() {
        var livreurId = $(this).val();
        var pickupAddress = $('#pickup_address').val();
        var deliveryAddress = $('#delivery_address').val();

        // Check if the selected livreur has route in order
        if (livreurId && pickupAddress && deliveryAddress) {
            $.ajax({
                url: '/livreur/' + livreurId + '/check-route', // Replace with your route for livreur route validation
                type: 'POST',
                data: {
                    pickup_address: pickupAddress,
                    delivery_address: deliveryAddress
                },
                dataType: 'json',
                success: function(response) {
                    if (response.valid) {
                        // Livreur is valid for the selected addresses
                        $('#livreur_id').removeClass('is-invalid').addClass('is-valid');
                    } else {
                        // Livreur is not valid for the selected addresses
                        $('#livreur_id').removeClass('is-valid').addClass('is-invalid');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error here
                }
            });
        }
    });
});
