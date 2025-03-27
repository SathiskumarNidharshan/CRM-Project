<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Transaction;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function createCheckoutSession($id)
    {
        $invoice = Invoice::findOrFail($id);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Invoice #' . $invoice->invoice_number,
                    ],
                    'unit_amount' => $invoice->amount * 100, // Convert to cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success', ['id' => $invoice->id]),
            'cancel_url' => route('stripe.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update(['status' => 'success']);

        // Create a new transaction entry
        Transaction::create([
            'invoice_number' => $invoice->id,
            'customer_id' => $invoice->customer_id,
            'amount' => $invoice->amount,
            'status' => 'success',
            'transaction_id' => Transaction::generateTransactionID(),  // Call the method to generate a transaction ID
        ]);

        return redirect()->route('invoice.index')->with('flash_message', 'Payment successful! Invoice marked as paid.');
    }

    public function cancel()
    {
        return redirect()->route('invoice.index')->with('flash_message', 'Payment cancelled.');
    }
}
