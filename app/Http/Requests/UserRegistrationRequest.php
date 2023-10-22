<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\ConfirmPassword;

class UserRegistrationRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => ['required', 'email'],
            'password' => 'required|min:6',
            'confirm_password' => ['required', new ConfirmPassword]
        ];
    }
    public function message(){
        return[
            'name.required' => 'Name is required!',
            'name.string' => 'Name should be a text!',
            'email.required' => 'Email is required!',
            'email.email' => 'Email should be correct format!',
            'password.required' => 'Password is required field!',
            'password.min' => 'Minimum charachter count should be 6!',
            'confirm_password.required' => 'Confirm password is required field!',
        ];
    }
}
