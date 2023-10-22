<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRegistrationRequest extends FormRequest
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
            'full_name' => 'required|string',
            'email' => 'required|email',
            'event_id' => 'required',
            'ticket_type' => 'required|string|in:regular,vip,speaker'
        ];
    }
    public function message(){
        return[
            'full_name.required' => 'full name is required',
            'full_name.string' => 'full name must be a string',
            'email.required' => 'email is required',
            'email.email' => 'email should be email',
            'ticket_type.required' => 'ticket is required',
            'ticket_type.string' => 'ticket should be string',
            'ticket_type.in' => 'ticket should be regular, vip or speaker'
        ];
    }
}
