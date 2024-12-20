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
            'image' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    // Check if a new file is uploaded
                    if ($this->hasFile('image')) {
                        // Validate the file types and size
                        $validator = \Validator::make(
                            $this->all(),
                            ['image' => 'mimes:jpeg,png,jpg,gif,webp|max:2048']
                        );

                        if ($validator->fails()) {
                            $fail($validator->errors()->first($attribute));
                        }
                    }
                }
            ],
            'description' => ['required', 'string'],
            'cost' => ['required', 'numeric'], 'min:0',
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'numeric', 'min:0'],
            'status' => ['required', Rule::in(['available', 'out_of_stock', 'enabled', 'disabled'])],
        ];
    }
}
