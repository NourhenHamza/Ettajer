<?php

namespace App\Http\Controllers;

use App\Models\ZonePrice;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZonePriceController extends Controller
{
    public function index()
    {
        $zonePrices = ZonePrice::with(['pickupZone', 'deliveryZone'])->get();
        return view('zone-prices.index', compact('zonePrices'));
    }

    public function create()
    {
        $zones = Zone::all();
        return view('zone-prices.create', compact('zones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pickup_zone_id' => 'required|exists:zones,id',
            'delivery_zone_id' => 'required|exists:zones,id',
            'price' => 'required|numeric|min:0',
        ]);

        ZonePrice::create($request->all());

        return redirect()->route('zone-prices.index')->with('success', 'Zone price created successfully.');
    }

    public function show(ZonePrice $zonePrice)
    {
        return view('zone-prices.show', compact('zonePrice'));
    }

    public function edit(ZonePrice $zonePrice)
    {
        $zones = Zone::all();
        return view('zone-prices.edit', compact('zonePrice', 'zones'));
    }

    public function update(Request $request, ZonePrice $zonePrice)
    {
        $request->validate([
            'pickup_zone_id' => 'required|exists:zones,id',
            'delivery_zone_id' => 'required|exists:zones,id',
            'price' => 'required|numeric|min:0',
        ]);

        $zonePrice->update($request->all());

        return redirect()->route('zone-prices.index')->with('success', 'Zone price updated successfully.');
    }

    public function destroy(ZonePrice $zonePrice)
    {
        $zonePrice->delete();

        return redirect()->route('zone-prices.index')->with('success', 'Zone price deleted successfully.');
    }
}
