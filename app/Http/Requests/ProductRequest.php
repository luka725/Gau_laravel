<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|unique:products',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'images' => 'sometimes|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:20048',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.unique' => 'The product name must be unique.',
            'description.string' => 'The product description must be a string.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a number.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'images.array' => 'The images field must be an array.',
            'images.*.image' => 'Each item in the images array must be an image.',
            'images.*.mimes' => 'Supported image formats are jpeg, png, jpg, and gif.',
            'images.*.max' => 'Each image must not exceed 20048 kilobytes.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => strtolower($this->input('name')),
            'description' => strtolower($this->input('description')),
        ]);
    }
}
