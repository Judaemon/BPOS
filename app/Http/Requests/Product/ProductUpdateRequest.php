<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => ['required', 'string'],
            'cost' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'status' => ['required', Rule::in(['available', 'out_of_stock', 'enabled', 'disabled'])],
        ];
    }
}
