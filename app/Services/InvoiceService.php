<?php

namespace App\Services;

use App\Http\Controllers\Api\VendorController;
use App\Models\Vendor;

class InvoiceService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function fillDueDates(array $data): array {
        $vendor = Vendor::where('id', $data['vendor_id'])->firstOrFail();
        $data['due_date'] = today()->addDays($vendor->payment_terms);
        return $data;
    }
}
