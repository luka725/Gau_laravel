<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MathRequest extends FormRequest
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
            "number" => "required|integer"
        ];
    }

    public function message()
    {
        return[
            "number.required" => "number should be passed",
            "number.integer" => "input value should be a integer"
        ];
    }
}
