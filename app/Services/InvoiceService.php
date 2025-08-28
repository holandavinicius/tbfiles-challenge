<?php

namespace App\Services;

use App\Http\Controllers\Api\VendorController;
use App\Models\Invoice;
use App\Models\Vendor;
use Carbon\Carbon;
use http\Client\Request;
use Illuminate\Support\Collection;

class InvoiceService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createInvoice(array $data): array {
        $vendor = Vendor::findOrFail($data['vendor_id']);
        $data['due_date'] = $data['due_date'] ?? $this->calculateDueDate($vendor);
        Invoice::create($data);
        return $data;
    }

    private function calculateDueDate(Vendor $vendor): Carbon{
        return today()->addDays($vendor->payment_terms);
    }

    public function getInvoices(array $filters): Collection {
        $query = Invoice::query();

        if (!empty($filters['vendor_id'])) $query->byVendor($filters['vendor_id']);
        if (!empty($filters['status'])) $query->byStatus($filters['status']);

        return $query->get();
    }
}
