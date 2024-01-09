<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogPostRequest extends FormRequest
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
            'title' => 'required|string|unique:blog_posts',
            'content' => 'required|string|min:500'
        ];
    }
    public function messages(){
        return [
            'title.unique' => 'The title must be a unique and meaningful title.',
            'content.min' => 'The content must be a well-written
            article with a minimum of 500 words'
        ];
    }
}
