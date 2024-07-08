<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the currencies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();
        return view('currencies.index', compact('currencies'));
    }

    /**
     * Update the default currency.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDefault(Request $request, $id)
    {
        $currency = Currency::findOrFail($id);

        if ($request->has('default') && $request->default == 'on') {
            // Deselect currently default currency
            Currency::where('id', '!=', $currency->id)->update(['is_default' => false]);

            // Update exchange rate for other currencies
            $defaultExchangeRate = 1.0; // Default exchange rate
            Currency::where('id', '!=', $currency->id)->update(['exchange_rate' => $defaultExchangeRate]);

            // Set current currency as default
            $currency->is_default = true;
            $currency->exchange_rate = $defaultExchangeRate;
        } else {
            $currency->is_default = false;
        }

        $currency->save();

        return redirect()->route('currencies.index')->with('success', 'Currency default updated successfully.');
    }

    /**
     * Show the form for creating a new currency.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created currency in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string',
            'iso_code' => 'required|string',
            'exchange_rate' => 'nullable|numeric',
            'decimals' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'symbol' => 'required|string',
            'default_currency' => 'boolean', // Assurez-vous que le champ default_currency est boolean
        ]);

        // Si la devise est marquée comme par défaut, assurons-nous qu'il n'y a pas d'autres devises par défaut
        if ($request->has('default_currency') && $request->input('default_currency')) {
            Currency::where('default_currency', true)->update(['default_currency' => false]);
        }

        // Création de la devise
        $currency = Currency::create($validatedData);

        // Redirection vers la liste des devises avec un message de succès
        return redirect()->route('currencies.index')->with('success', 'Currency created successfully.');
    }

    /**
     * Display the specified currency.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('currencies.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified currency.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('currencies.edit', compact('currency'));
    }

    /**
     * Update the specified currency in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string',
            'iso_code' => 'required|string',
            'exchange_rate' => 'nullable|numeric',
            'decimals' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'symbol' => 'required|string',
            'default_currency' => 'boolean', // Assurez-vous que le champ default_currency est boolean
        ]);

        // Si la devise est marquée comme par défaut, assurons-nous qu'il n'y a pas d'autres devises par défaut
        if ($request->has('default_currency') && $request->input('default_currency')) {
            Currency::where('default_currency', true)->update(['default_currency' => false]);
        }

        // Mise à jour de la devise
        $currency->update($validatedData);

        // Redirection vers la liste des devises avec un message de succès
        return redirect()->route('currencies.index')->with('success', 'Currency updated successfully.');
    }

    /**
     * Remove the specified currency from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        // Redirection vers la liste des devises avec un message de succès
        return redirect()->route('currencies.index')->with('success', 'Currency deleted successfully.');
    }
}

