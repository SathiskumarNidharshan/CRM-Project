<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'status'];

    // Define the relationship with the Transaction model
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
