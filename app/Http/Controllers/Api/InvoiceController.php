<?php

namespace App\Http\Controllers\Api;

use     App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use function PHPUnit\Framework\isEmpty;

class InvoiceController extends Controller
{
    private InvoiceService $invoiceService;
    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request): Response
    {
        $data = $request->validated();
        $this->invoiceService->createInvoice($data);
        return response()->noContent(201);
    }

    public function getInvoices(Request $request): JsonResponse {
        $filters = $request->only(['vendor_id', 'status']);
        $invoices = $this->invoiceService->getInvoices($filters);
        return response()->json($invoices, 200);
    }
}
