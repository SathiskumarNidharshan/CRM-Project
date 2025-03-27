<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Proposal;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalProposals = Proposal::count();
        $totalInvoices = Invoice::count();
        $totalTransactions = Transaction::count();

        // Fetch the recent customers, proposals, and invoices
        $recentCustomers = Customer::latest()->take(3)->get();  // Get the 5 most recent customers
        $recentProposals = Proposal::latest()->take(3)->get();  // Get the 5 most recent proposals
        $recentInvoices = Invoice::latest()->take(3)->get();

        // return view('dashboard', ['user' => auth()->user()]);
        return view('dashboard', compact('totalCustomers', 'totalProposals', 'totalInvoices', 'totalTransactions', 'recentCustomers', 'recentProposals', 'recentInvoices'));
    }
}
