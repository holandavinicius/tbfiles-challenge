<?php

namespace App\Http\Controllers\Api;

use     App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Models\Invoice;
use App\Services\InvoiceService;
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
        $data = empty($data['due_date']) ? $this->invoiceService->fillDueDates($data) : $data;
        $invoice = Invoice::create($data);
        return response()->noContent(201);
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
