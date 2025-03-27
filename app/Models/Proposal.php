<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposals';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'customer_id', 'status'];
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
