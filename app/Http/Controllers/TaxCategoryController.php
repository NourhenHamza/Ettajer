<?php

namespace App\Http\Controllers;

use App\Models\TaxCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaxCategoryController extends Controller
{
    public function index()
    {
        $taxCategories = TaxCategory::all();
        return view('taxcategories.index', compact('taxCategories'));
    }

    public function create()
    {
        return view('taxcategories.create');
    }

  
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'type' => 'required|string|in:fix,pourcentage',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        TaxCategory::create($request->all());

        return redirect()->route('taxcategories.index')->with('success', 'Tax category created successfully.');
    }
  

    public function show(TaxCategory $taxCategory)
    {
        return view('taxcategories.show', compact('taxCategory'));
    }

    public function edit(TaxCategory $taxCategory)
    {
        return view('taxcategories.edit', compact('taxCategory'));
    }

    
    public function update(Request $request, TaxCategory $taxCategory)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'type' => 'required|string|in:fix,pourcentage',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $taxCategory->update($request->all());

        return redirect()->route('taxcategories.index')->with('success', 'Tax category updated successfully.');
    }
  

    public function destroy(TaxCategory $taxCategory)
    {
        $taxCategory->delete();

        return redirect()->route('taxcategories.index')->with('success', 'Tax category deleted successfully.');
    }
}
