<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\delivery\DeliveryType;
use Illuminate\Http\Request;

class DeliveryTypeController extends Controller
{
    public function index()
    {
        $deliveryTypes = DeliveryType::all();
        return view('delivery_types.index', compact('deliveryTypes'));
    }

    public function create()
    {
        return view('delivery_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DeliveryType::create($request->all());

        return redirect()->route('delivery_type.index')->with('success', 'Delivery type created successfully.');
    }

    public function show(DeliveryType $deliveryType)
    {
        return view('delivery_types.show', compact('deliveryType'));
    }

    public function edit(DeliveryType $deliveryType)
    {
        return view('delivery_types.edit', compact('deliveryType'));
    }

    public function update(Request $request, DeliveryType $deliveryType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $deliveryType->update($request->all());

        return redirect()->route('delivery_type.index')->with('success', 'Delivery type updated successfully.');
    }

    public function destroy(DeliveryType $deliveryType)
    {
        $deliveryType->delete();

        return redirect()->route('delivery_type.index')->with('success', 'Delivery type deleted successfully.');
    }
}
