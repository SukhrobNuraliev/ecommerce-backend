<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'delivery_method_id' => 'required|numeric',
            'payment_type_id' => 'required|numeric',
            'products' => 'required',
            'products.*.product_id' => 'required|numeric',
            'products.*.quantity' => 'required|numeric',
            'products.*.stock_id' => 'nullable|numeric',
            'comment' => 'nullable|max:500'
        ];
    }
}
