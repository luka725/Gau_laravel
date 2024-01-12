<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimpleAdditionRequest extends FormRequest
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
            'number1' => 'required|integer',
            'number2' => 'required|integer'
         ];
    }
    public function messages(){
        return [
            'number1.required' => 'Number 1 is required',
            'number2.required' => 'Number 2 is required',
            'number1.integer' => 'Number must be an integer',
            'number2.integer' => 'Number must be an integer'
        ];
    }
}
