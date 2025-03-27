<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_number', 'customer_id', 'amount', 'status', 'transaction_id'];

    public static function generateTransactionID()
    {
        $lastTransaction = self::latest()->first();
        $number = $lastTransaction ? (int) substr($lastTransaction->transaction_id, 3) + 1 : 1001;
        return 'TRA' . $number;
    }

    // Relationship with Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_number', 'id');
    }

    // Relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
