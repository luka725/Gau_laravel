<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'hobbies' => 'required|array|max:5',
            'hobbies.*' => 'string',
        ];
    }
    public function messages()
    {
        return [
            'hobbies.required' => 'please provide hobbies',
            'hobbies.array' => 'value should be an array',
            'hobbies.max:5' => 'maximum value count is 5',
            'hobbies.*.string' => 'items should be a string',
        ];
    }
}
