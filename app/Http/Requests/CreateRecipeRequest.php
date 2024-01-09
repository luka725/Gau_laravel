<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecipeRequest extends FormRequest
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
            'ingredients' => 'required|array|min:1',
            'ingredients.*.note' => 'nullable|string',
            'ingredients.*.name' => 'required|string',
            'ingredients.*.quantity' => 'required|integer|min:1'
        ];
    }
    public function messages()
    {
        return [
            'ingredients.required' => 'ingredients array is required',
            'ingredients.array' => 'ingredients type should be an array',
            'ingredients.*.name.required' => "ingredient should have name",
            'ingredients.*.name.string' => 'The ingredient name must be a string.',
            'ingredients.*.note.string' => 'The ingredient notes must be a string',
            'ingredients.*.quantity.required' => "quantity is required",
            'ingredients.*.quantity.integer' => 'The ingredient quantity must be an integer.',        
        ];
    }
}
