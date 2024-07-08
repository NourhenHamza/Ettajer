<?php

namespace App\Http\Controllers;

use App\Models\delivery\ParcelStatus;
use Illuminate\Http\Request;

class ParcelStatusController extends Controller
{
    public function index()
    {
        $parcelStatuses = ParcelStatus::all();
        return view('delivery.parcel.parcel_status.index', compact('parcelStatuses'));
    }

    public function create()
    {
        return view('delivery.parcel.parcel_status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        ParcelStatus::create($request->all());
        return redirect()->route('parcel_status.index')->with('success', 'Parcel Status created successfully.');
    }

    public function show(ParcelStatus $parcelStatus)
    {
        return view('delivery.parcel.parcel_status.show', compact('parcelStatus'));
    }

    public function edit(ParcelStatus $parcelStatus)
    {
        return view('delivery.parcel.parcel_status.edit', compact('parcelStatus'));
    }

    public function update(Request $request, ParcelStatus $parcelStatus)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $parcelStatus->update($request->all());
        return redirect()->route('parcel_status.index')->with('success', 'Parcel Status updated successfully.');
    }

    public function destroy(ParcelStatus $parcelStatus)
    {
        $parcelStatus->delete();
        return redirect()->route('parcel_status.index')->with('success', 'Parcel Status deleted successfully.');
    }
}
