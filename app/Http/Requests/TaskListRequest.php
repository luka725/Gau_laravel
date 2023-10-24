<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskListRequest extends FormRequest
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
            'count' => 'required|integer'
        ];
    }
    public function message()
    {
        return [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'count.required' => 'Count is required',
            'count.integer' => 'Count must be a number'
        ];
    }
}
