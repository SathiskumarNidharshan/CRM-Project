<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $customers = Customer::paginate(10); // Display 10 customers per page
        // $customers = Customer::all();
        return view('customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',  // Name is required, with a max length of 255
            'email' => 'required|email|max:255',  // Email is required, must be valid, and has a max length of 255
            'phone' => 'required|numeric|digits:10',  // Phone is required, must be numeric, and exactly 10 digits
        ]);

        $input = $request->all();
        Customer::create($input);
        return redirect('customer')->with('flash_message', 'Customer Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $customers = Customer::find($id);
        return view('customer.show')->with('customers', $customers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $customers = Customer::find($id);
        return view('customer.edit')->with('customers', $customers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',  // Name is required, with a max length of 255
            'email' => 'required|email|max:255',  // Email is required, must be valid, and has a max length of 255
            'phone' => 'required|numeric|digits:10',  // Phone is required, must be numeric, and exactly 10 digits
        ]);

        $customers = Customer::find($id);
        $input = $request->all();
        $customers->update($input);
        return redirect('customer')->with('flash_message', 'Customer Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Customer::destroy($id);
        return redirect('customer')->with('flash_message', 'Customer deleted!');
    }

    /**
     * Change the status of the specified resource.
     */
    public function changeStatus(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:active,inactive',  // Validate that the status is either 'active' or 'inactive'
        ]);

        $customer = Customer::find($id);
        if ($customer) {
            $customer->status = $request->input('status');  // Update the status field
            $customer->save();
            return redirect()->route('customer.index')->with('flash_message', 'Customer status updated!');
        } else {
            return redirect()->route('customer.index')->with('flash_message', 'Customer not found!');
        }
    }
}
