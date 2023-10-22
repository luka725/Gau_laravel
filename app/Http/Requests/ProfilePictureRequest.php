<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePictureRequest extends FormRequest
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
            'picture' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    public function message(){
        return [
            'picture.required' => 'picture is required',
            'picture.mimes' => 'wrong format',
            'picture.size' => 'max file size 2MB'
        ];
    }
}
