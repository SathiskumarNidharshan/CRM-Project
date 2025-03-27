<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $proposals = Proposal::all();
        $proposals = Proposal::paginate(10);
        return view('proposal.index')->with('proposals', $proposals);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $customers = Customer::all();
        return view('proposal.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => 'required|max:255',  // Name is required, with a max length of 255
        //     'email' => 'required|email|max:255',  // Email is required, must be valid, and has a max length of 255
        //     'phone' => 'required|numeric|digits:10',  // Phone is required, must be numeric, and exactly 10 digits
        // ]);

        // $input = $request->all();
        // Proposal::create($input);
        // return redirect('proposal')->with('flash_message', 'Proposal Addedd!');
        $request->validate([
            'title' => 'required|max:255',  // Title is required, with a max length of 255
            'description' => 'required',    // Description is required
            'customer_id' => 'required|exists:customers,id',  // customer_id is required and must exist in the 'customers' table
        ]);

        $input = $request->all();

        // Create the proposal using the validated input
        Proposal::create($input);

        // Redirect back with a success message
        return redirect('proposal')->with('flash_message', 'Proposal Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $proposals = Proposal::find($id);
        return view('proposal.show')->with('proposals', $proposals);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $proposals = Proposal::find($id);
        return view('proposal.edit')->with('proposals', $proposals);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // $request->validate([
        //     'name' => 'required|max:255',  // Name is required, with a max length of 255
        //     'email' => 'required|email|max:255',  // Email is required, must be valid, and has a max length of 255
        //     'phone' => 'required|numeric|digits:10',  // Phone is required, must be numeric, and exactly 10 digits
        // ]);
        // Validate the input
        $request->validate([
            'title' => 'required|max:255',  // Title is required, with a max length of 255
            'description' => 'required',    // Description is required
            //'customer_id' => 'required|exists:customers,id',  // customer_id must exist in the customers table
            'status' => 'required|in:pending,approved,rejected',  // Ensure status is valid
        ]);

        $proposals = Proposal::find($id);
        // $input = $request->all();
        // Retrieve the validated input
        // If the proposal doesn't exist, redirect with an error message
        if (!$proposals) {
            return redirect()->route('proposal.index')->with('error', 'Proposal not found');
        }

        // Update only the title and description
        $proposals->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),  // Update the status
        ]);
        return redirect('proposal')->with('flash_message', 'Proposal Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Proposal::destroy($id);
        return redirect('proposal')->with('flash_message', 'Proposal deleted!');
    }


    public function changeStatus(Request $request, string $id): RedirectResponse
    {


        // if (!$proposals) {
        //     return redirect()->route('proposal.index')->with('error', 'Proposal not found');
        // }

        // Validate the status input (optional)
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',  // Possible statuses
        ]);
        $proposal = Proposal::find($id);

        // // Update the status
        // $proposals->status = $request->input('status');
        // $proposals->save();

        // return redirect()->route('proposal.index')->with('flash_message', 'Proposal status updated!');
        if ($proposal) {
            $proposal->status = $request->input('status');  // Update the status field
            $proposal->save();
            return redirect()->route('proposal.index')->with('flash_message', 'Proposal status updated!');
        } else {
            return redirect()->route('proposal.index')->with('flash_message', 'Proposal not found!');
        }
    }
}
