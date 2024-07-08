<?php

namespace App\Http\Controllers;

use App\Models\customer\Customer; // Adjust the namespace according to your actual model location
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:22',
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'tax_nr' => 'nullable|string|max:17',
            'registration_nr' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:22',
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'tax_nr' => 'nullable|string|max:17',
            'registration_nr' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
    public function view(Customer $customer)
    {
        return view('customers.view', compact('customer'));
    }



}
