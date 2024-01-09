<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|integer|min:1',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.options'=> 'required|array',
            'items.*.options.*' => 'string',

        ];
    }
    public function messages()
    {
        return [
            'items.required' => 'The items field is required.',
            'items.array' => 'The items must be an array.',
            'items.min' => 'At least one item is required.',
            
            'items.*.product_id.required' => 'The product ID of the item is required.',
            'items.*.product_id.integer' => 'The product ID of the item must be an integer.',
            'items.*.product_id.min' => 'The product ID of the item must be at least 1.',
            
            'items.*.quantity.required' => 'The quantity of the item is required.',
            'items.*.quantity.integer' => 'The quantity of the item must be an integer.',
            'items.*.quantity.min' => 'The quantity of the item must be at least 1.',
            
            'items.*.options.required' => 'The options of the item are required.',
            'items.*.options.array' => 'The options of the item must be an array.',
            'items.*.options.*.string' => 'Each option of the item must be a string.',
        ];
    }
}
