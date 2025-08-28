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
        $summary = $this->vendorService->getSummary($id);
        return response()->json($summary);
    }
    public function getSummaryPerVendor(): JsonResponse
    {
        $summaries = $this->vendorService->getSummaryPerVendor();
        return response()->json($summaries);
    }
}
