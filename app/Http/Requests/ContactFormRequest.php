<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
    public function rules():array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|max:500'
        ];
    }
    public function message():array
    {
        return [
            'name.required' => 'Name field is required!',
            'name.string' => 'Name should be a text type!',
            'email.required' => 'Email is required field!',
            'email.email' => 'Email should be a correct format',
            'message.required' => 'Message is required!',
            'message.max' => 'maximum number of character is 500!'
        ];
    }
}
