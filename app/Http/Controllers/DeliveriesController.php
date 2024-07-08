<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery\Delivery;
use App\Models\delivery\PickupAddress;
use App\Models\delivery\DeliveryAddress;
use App\Models\delivery\Parcel;
use App\Models\delivery\DeliveryType;
use App\Models\delivery\ParcelStatus;
use App\Models\delivery\ProductMaterial;
use App\Models\Livreur;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class DeliveriesController extends Controller
{
    /**
     * Display a listing of the deliveries.
     *
     * @return View
     */
    public function index(): View
    {
        $deliveries = Delivery::with(['pickupAddress', 'deliveryAddress', 'parcel.parcelStatus', 'deliveryType'])->get();
        return view('deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new delivery.
     *
     * @return View
     */
    public function create(): View
    {
        // Fetch necessary data for form fields
        $parcelStatuses = ParcelStatus::all();
        $productMaterials = ProductMaterial::all();
        $deliveryTypes = DeliveryType::all();
        
        // Fetch livreurs filtered by delivery route
        $livreurs = $this->getLivreursForDelivery();

        // Pass data to the view
        return view('deliveries.create', compact('parcelStatuses', 'productMaterials', 'deliveryTypes', 'livreurs'));
    }

    /**
     * Store a newly created delivery in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'pickup_recipient_name' => 'required|string|max:255',
            'pickup_phone_number' => 'required|string|max:15',
            'pickup_address' => 'required|string|max:255',
            'delivery_recipient_name' => 'required|string|max:255',
            'delivery_phone_number' => 'required|string|max:15',
            'delivery_address' => 'required|string|max:255',
            'parcel_status_id' => 'required|exists:parcel_statuses,id',
            'product_material_id' => 'required|exists:product_materials,id',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'depth' => 'required|numeric',
            'width' => 'required|numeric',
            'delivery_type_id' => 'required|exists:delivery_types,id',
            'livreur_id' => 'required|exists:livreurs,id', // Add livreur_id validation
        ]);

        try {
            \DB::beginTransaction();

            // Create pickup address
            $pickupAddress = PickupAddress::create([
                'recipient_name' => $request->pickup_recipient_name,
                'phone_number' => $request->pickup_phone_number,
                'address' => $request->pickup_address,
            ]);

            // Create delivery address
            $deliveryAddress = DeliveryAddress::create([
                'recipient_name' => $request->delivery_recipient_name,
                'phone_number' => $request->delivery_phone_number,
                'address' => $request->delivery_address,
            ]);

            // Create parcel
            $parcel = Parcel::create([
                'parcel_status_id' => $request->parcel_status_id,
                'product_material_id' => $request->product_material_id,
                'price' => $request->price,
                'weight' => $request->weight,
                'height' => $request->height,
                'depth' => $request->depth,
                'width' => $request->width,
            ]);

            // Create delivery
            Delivery::create([
                'pickup_address_id' => $pickupAddress->id,
                'delivery_address_id' => $deliveryAddress->id,
                'parcel_id' => $parcel->id,
                'delivery_type_id' => $request->delivery_type_id,
                'livreur_id' => $request->livreur_id, // Assign livreur_id to delivery
            ]);

            \DB::commit();

            return redirect()->route('deliveries.index')->with('success', 'Delivery created successfully.');
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->with('error', 'Failed to create delivery. Please try again.');
        }
    }

    /**
     * Fetch livreurs filtered by delivery route including both pickup and delivery addresses.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getLivreursForDelivery()
    {
        $pickupAddress = request()->input('pickup_address');
        $deliveryAddress = request()->input('delivery_address');

        return Livreur::whereHas('deliveryRoute', function ($query) use ($pickupAddress, $deliveryAddress) {
            $query->where('cities', 'like', '%' . $pickupAddress . '%')
                  ->where('cities', 'like', '%' . $deliveryAddress . '%');
        })->get();
    }

    /**
     * Display the specified delivery.
     *
     * @param  Delivery  $delivery
     * @return View
     */
    public function show(Delivery $delivery): View
    {
        return view('deliveries.show', compact('delivery'));
    }

    /**
     * Show the form for editing the specified delivery.
     *
     * @param  Delivery  $delivery
     * @return View
     */
    public function edit(Delivery $delivery): View
    {
        $parcelStatuses = ParcelStatus::all();
        $productMaterials = ProductMaterial::all();
        $deliveryTypes = DeliveryType::all();

        return view('deliveries.edit', compact('delivery', 'parcelStatuses', 'productMaterials', 'deliveryTypes'));
    }

    /**
     * Update the specified delivery in storage.
     *
     * @param  Request  $request
     * @param  Delivery  $delivery
     * @return RedirectResponse
     */
    public function update(Request $request, Delivery $delivery): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'pickup_recipient_name' => 'required|string|max:255',
            'pickup_phone_number' => 'required|string|max:255',
            'pickup_address' => 'required|string|max:255',
            'delivery_recipient_name' => 'required|string|max:255',
            'delivery_phone_number' => 'required|string|max:255',
            'delivery_address' => 'required|string|max:255',
            'parcel_status_id' => 'required|integer|exists:parcel_statuses,id',
            'product_material_id' => 'required|integer|exists:product_materials,id',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'depth' => 'required|numeric',
            'width' => 'required|numeric',
            'delivery_type_id' => 'required|integer|exists:delivery_types,id',
            'livreur_id' => 'required|exists:livreurs,id', // Add livreur_id validation
        ]);

        try {
            \DB::beginTransaction();

            // Update pickup address
            $delivery->pickupAddress->update([
                'recipient_name' => $request->input('pickup_recipient_name'),
                'phone_number' => $request->input('pickup_phone_number'),
                'address' => $request->input('pickup_address'),
            ]);

            // Update delivery address
            $delivery->deliveryAddress->update([
                'recipient_name' => $request->input('delivery_recipient_name'),
                'phone_number' => $request->input('delivery_phone_number'),
                'address' => $request->input('delivery_address'),
            ]);

            // Update parcel
            $delivery->parcel->update([
                'parcel_status_id' => $request->input('parcel_status_id'),
                'product_material_id' => $request->input('product_material_id'),
                'price' => $request->input('price'),
                'weight' => $request->input('weight'),
                'height' => $request->input('height'),
                'depth' => $request->input('depth'),
                'width' => $request->input('width'),
            ]);

            // Update delivery
            $delivery->update([
                'delivery_type_id' => $request->input('delivery_type_id'),
                'livreur_id' => $request->input('livreur_id'), // Update livreur_id for delivery
            ]);

            \DB::commit();

            return redirect()->route('deliveries.index')->with('success', 'Delivery updated successfully.');
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->with('error', 'Failed to update delivery. Please try again.');
        }
    }

    /**
     * Remove the specified delivery from storage.
     *
     * @param  Delivery  $delivery
     * @return RedirectResponse
     */
    public function destroy(Delivery $delivery): RedirectResponse
    {
        try {
            $delivery->delete();
            return redirect()->route('deliveries.index')->with('success', 'Delivery deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete delivery. Please try again.');
        }
    }
}
