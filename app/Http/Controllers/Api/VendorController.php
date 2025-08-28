<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GetVendorSummaryResource;
use App\Models\Vendor;
use App\Services\VendorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private VendorService $vendorService;

    public function __construct(VendorService $vendorService)
    {
        $this->vendorService = $vendorService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getSummary(int $id): JsonResponse
    {
        $vendor = Vendor::findOrFail($id);
        $summary = $this->vendorService->calculateSummary($vendor);
        return response()->json([
            'vendor' => [
                'id' => $vendor->id,
                'name' => $vendor->name,
                'vat_number' => $vendor->vat_number,
                'payment_terms' => $vendor->payment_terms,
            ],
            'summary' => $summary
        ]);
    }
}
