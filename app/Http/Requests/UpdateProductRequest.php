<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */


    public function rules()
    {
        return [
            'name' => 'required|unique:products,name',
            'category_id' => 'required',
            'brand_id' => 'nullable',
            'standard' => 'required|numeric',
            'premium' => 'required|numeric',
            'gold' => 'required|numeric',
            'measuring_unit' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'description' => 'nullable|max:1000',
            'product_image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product Name is Required',
            'category_id.required' => "Product Category is required",
            'standard.required' => "Standard Price is required",
            'premium.required' => "Premium Price is required",
            'gold.required' => "Gold Price is required",
            'title.required' => "Title is required",
            'product_image.required' => "Product Image is required",
        ];
    }
}
