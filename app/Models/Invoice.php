<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['customer_id', 'amount', 'due_date', 'invoice_number', 'status', 'stripe_payment_intent'];

    public static function generateInvoiceNumber()
    {
        $lastInvoice = self::latest()->first();
        $number = $lastInvoice ? (int) substr($lastInvoice->invoice_number, 3) + 1 : 1001;
        return 'INV' . $number;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    use HasFactory;

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
