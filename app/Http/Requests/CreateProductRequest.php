<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: check user must be admin
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', ],
            'desc' => ['required', 'string', ],
            'SKU' => ['required', 'string', ],
            'price' => ['required', ],
            'category_id' => ['nullable', 'exists:product_categories,id', ],
            // 'discount_id' => ['nullable', 'exists:product_discounts,id', ],
            'imageFile' => ['nullable'],
            // 'imageFile.*' => ['mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048']
        ];
    }
}
