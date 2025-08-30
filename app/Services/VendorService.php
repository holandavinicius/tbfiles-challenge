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

    public function getSummary(int $id): array {
        $vendor = Vendor::findOrFail($id);
        $invoices = $vendor->invoices;

        return [
            'vendor' => [
                'id' => $vendor->id,
                'name' => $vendor->name,
                'vat_number' => $vendor->vat_number,
                'payment_terms' => $vendor->payment_terms,
            ],
            'summary' => [
                'total_invoices' => $invoices->count(),
                'total_amount' => round($invoices->sum('amount'),2),
                'pending_invoices' => $invoices->where('status', 'pending')->count(),
                'pending_amount' => round($invoices->where('status', 'pending')->sum('amount'),2),
                'paid_amount' => round($invoices->where('status', 'paid')->sum('amount'),2)
            ]
        ];
    }

    public function getSummaryPerVendor(): array {
        return Vendor::pluck('id')->map(function ($id) {
            return $this->getSummary($id);
        })->toArray();
    }
}
