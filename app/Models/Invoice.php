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

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function scopeByVendor($query, $vendorId) {
        return $query->where('vendor_id', $vendorId);
    }
    public function scopeByStatus($query, $status) {
        return $query->where('status', $status);
    }
}
