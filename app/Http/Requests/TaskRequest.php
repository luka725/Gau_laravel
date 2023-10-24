<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'exec_date' => 'required',
            'exec_status' => 'required|bool',
            'completion_date' => 'required'
        ];
    }

    public function message()
    {
        return [
        'title.required' => 'Title is required',
        'description.required' => 'Description is required',
        'exec_date.required' => 'Execution date is required',
        'exec_status.required' => 'Execution status is required',
        'completion_date.required' => 'Completion date is required'
        ];
    }
}
