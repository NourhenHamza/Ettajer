<?php

namespace App\Http\Controllers;

use App\Models\Delivery\ProductMaterial;
use Illuminate\Http\Request;

class ProductMaterialController extends Controller
{
    public function index()
    {
        $productMaterials = ProductMaterial::all();
        return view('delivery.parcel.product_material.index', compact('productMaterials'));
    }

    public function create()
    {
        return view('delivery.parcel.product_material.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        ProductMaterial::create($request->all());
        return redirect()->route('product_material.index')->with('success', 'Product Material created successfully.');
    }

    public function show(ProductMaterial $productMaterial)
    {
        return view('delivery.parcel.product_material.show', compact('productMaterial'));
    }

    public function edit(ProductMaterial $productMaterial)
    {
        return view('delivery.parcel.product_material.edit', compact('productMaterial'));
    }

    public function update(Request $request, ProductMaterial $productMaterial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $productMaterial->update($request->all());
        return redirect()->route('product_material.index')->with('success', 'Product Material updated successfully.');
    }

    public function destroy(ProductMaterial $productMaterial)
    {
        $productMaterial->delete();
        return redirect()->route('product_material.index')->with('success', 'Product Material deleted successfully.');
    }
}
