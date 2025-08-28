<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "invoice_number" => "required|string|max:255",
            "vendor_id"      => "required|integer",
            "amount"         => "required|numeric|min:0",
            "doc_date"       => "required|date",
            "due_date"       => "nullable|date",
            "status"         => "required|string|in:pending,paid",
        ];
    }
}
