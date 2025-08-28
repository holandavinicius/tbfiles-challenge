<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $fillable = [
        'invoice_number',
        'vendor_id',
        'amount',
        'doc_date',
        'due_date',
        'status',
    ];
}
