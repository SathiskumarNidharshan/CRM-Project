<!DOCTYPE html>
<html>

<head>
    <title>Your Invoice</title>
</head>

<body>
    <h2>Hello {{ $invoice->customer->name }},</h2>
    <p>Here is your invoice: <strong>{{ $invoice->invoice_number }}</strong></p>
    <p>Amount: Rs. {{ $invoice->amount }}</p>
    <p>Due Date: {{ $invoice->due_date }}</p>
    <p>Status: {{ $invoice->status }}</p>

    <a href="{{ $payment_url }}" style="background-color: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">
        Pay Now
    </a>

    <p>Thank you for your business!</p>
</body>

</html>