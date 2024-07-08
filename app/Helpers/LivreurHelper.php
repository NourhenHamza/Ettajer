<?php

namespace App\Helpers;

use App\Models\Livreur;

if (! function_exists('livreurHasRouteInOrder')) {

    /**
     * Check if the Livreur has a valid route between pickup and delivery addresses.
     *
     * @param Livreur $livreur
     * @param string $pickupAddress
     * @param string $deliveryAddress
     * @return bool
     */
    function livreurHasRouteInOrder($livreur, $pickupAddress, $deliveryAddress)
    {
        // Ensure Livreur has a delivery route
        if (!$livreur->deliveryRoute) {
            return false;
        }

        // Check if the delivery route covers both pickup and delivery addresses
        return $livreur->deliveryRoute->coversAddresses($pickupAddress, $deliveryAddress);
    }
}
