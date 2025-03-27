<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * Show all transactions for a specific customer.
     */
    public function index(): View
    {
        // Fetch all transactions

        $transactions = Transaction::with('customer', 'invoice')->get();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show transactions of a specific customer.
     */
    public function show(Customer $customer): View
    {
        // Fetch transactions of a customer
        $transactions = $customer->transactions()->with('invoice')->get();
        return view('transaction.show', compact('transactions', 'customer'));
    }

    /**
     * Show details of a specific transaction.
     */
    public function showTransaction($id)
    {
        $transactions = Transaction::with(['customer', 'invoice'])->findOrFail($id);
        return view('transaction.details', compact('transaction'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'invoice_number' => 'required|exists:invoices,id',
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'status' => 'required|in:success,pending,failed',
            'transaction_id' => 'required|unique:transactions',

        ]);

        // Create a new transaction
        Transaction::create($request->only(['invoice_number', 'customer_id', 'amount', 'status', 'transaction_id']));

        return redirect()->route('transaction.index')->with('success', 'Transaction saved successfully.');

        // // Use mass-assignment to create the transaction
        // $transaction = Transaction::create([
        //     'invoice_id' => $request->invoice_id,
        //     'customer_id' => $request->customer_id,
        //     'amount' => $request->amount,
        //     'status' => $request->status,
        //     'transaction_id' => $request->transaction_id,

        // ]);

        // // Return a success message or handle errors
        // if ($transaction) {
        //     return redirect()->route('transaction.index')->with('success', 'Transaction saved successfully.');
        // } else {
        //     return back()->with('error', 'Failed to save transaction.');
        // }
    }
}
