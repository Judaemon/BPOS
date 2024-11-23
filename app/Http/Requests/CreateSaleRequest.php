<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class CreateSaleRequest extends FormRequest
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
            'total_amount' => 'required|numeric|min:1',

            'customer_name' => 'required|string',
            'payment_method' => 'required|string|in:gcash,cash',
            'account_number' => 'required_if:payment_method,gcash|nullable|string',
            'payment' => [
                'nullable',
                'numeric',
                'required_if:payment_method,cash',
                function ($attribute, $value, $fail) {
                    if (request('payment_method') === 'cash' && $value <= 0) {
                        $fail('The payment must be greater than 0 for cash payments.');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (request('payment_method') === 'cash' && $value < request('total_amount')) {
                        $fail('The payment must be greater than or equal to the total amount for cash payments.');
                    }
                },
            ],

            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => [
                'required', 
                'integer', 
                'min:1',
                function ($attribute, $value, $fail) {
                    $index = (int) str_replace('products.', '', explode('.', $attribute)[1]);
                    $productData = request('products')[$index];
                    $product = Product::find($productData['product_id']);
                    
                    if ($product && $product->stock < $value) {
                        $fail('The quantity of ' . $product->name . ' is not enough.');
                    }
                },
            ],
            'products.*.cost' => 'required|numeric|min:1',
            'products.*.price' => 'required|numeric|min:1',
            'products.*.item_total' => 'required|numeric|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'payment.gte' => 'The payment should be greater than or equal to the total amount.',
        ];
    }
}
