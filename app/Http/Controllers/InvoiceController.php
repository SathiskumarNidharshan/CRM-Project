<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;
use App\Mail\InvoiceMail;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $invoices = Invoice::all();
        $invoices = Invoice::paginate(10);
        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $customers = Customer::all();
        return view('invoice.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        // Invoice::create($request->all());
        Invoice::create([
            'customer_id' => $request->customer_id,
            'amount' => $request->amount,
            'due_date' => $request->due_date,
            'invoice_number' => Invoice::generateInvoiceNumber(),
        ]);

        Transaction::create([
            'invoice_number' => 'required|exists:invoices,id',
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'status' => 'required|in:success,pending,failed',
            'transaction_id' => Transaction::generateTransactionId(),
        ]);

        return redirect()->route('invoice.index')->with('flash_message', 'Invoice created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $invoices = Invoice::find($id);
        return view('invoice.show')->with('invoices', $invoices);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $invoice = Invoice::findOrFail($id);
        $customers = Customer::all();
        return view('invoice.edit', compact('invoice', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $invoice = Invoice::findOrFail($id);

        $request->validate([
            'amount' => 'required|numeric',
            // 'status' => 'required|in:pending,paid',
            'due_date' => 'required|date',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoice.index')->with('flash_message', 'Invoice updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoice.index')->with('flash_message', 'Invoice deleted successfully!');
    }


    /**
     * Change the status of the invoice.
     */
    public function changeStatus(Request $request, $id): RedirectResponse
    {
        $invoice = Invoice::findOrFail($id);

        // You can define valid status values
        $validStatuses = ['pending', 'paid', 'overdue'];

        // Ensure the status provided is valid
        if (!in_array($request->status, $validStatuses)) {
            return back()->with('error', 'Invalid status!');
        }

        // Update the status
        $invoice->update(['status' => $request->status]);

        return redirect()->route('invoice.index')->with('flash_message', 'Invoice status updated successfully!');
    }

    public function sendInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $customerEmail = $invoice->customer->email;

        Mail::to($customerEmail)->send(new InvoiceMail($invoice));

        return redirect()->route('invoice.index')->with('flash_message', 'Invoice sent successfully!');
    }
}
