<?php

namespace App\Services;

use App\Http\Resources\GetVendorSummaryResource;
use App\Models\Invoice;
use App\Models\Vendor;

class VendorService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function calculateSummary(Vendor $vendor): array {
        $invoices = $vendor->invoices();
        return [
            'total_invoices' => $invoices->count(),
            'total_amount' => $invoices->sum('amount'),
            'pending_invoices' => $invoices->where('status', 'pending')->count(),
            'pending_amount' => $invoices->where('status', 'pending')->sum('amount'),
            'paid_amount' => $invoices->where('status', 'paid')->sum('amount')
        ];
    }
}
