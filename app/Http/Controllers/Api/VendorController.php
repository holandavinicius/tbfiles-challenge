<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Services\VendorService;
use Illuminate\Http\Request;

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

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getSummary(int $id)
    {
        $vendor = Vendor::findOrFail($id);

        return response()->json([
            'vendor' => $vendor,
            'summary' => $this->vendorService->getSummary($vendor->id)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
