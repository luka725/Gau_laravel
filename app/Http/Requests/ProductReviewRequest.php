<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewRequest extends FormRequest
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
            'product_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'max:1000'
        ];
    }
    public function message(){
        return[
            'product_id.required' => 'Product Id is required!',
            'rating.required' => 'Rating is required!',
            'rating.integer' => 'Rating value should be integer',
            'rating.min' => 'minimum rating should be between 1',
            'rating.max' => 'maximum value of rating shouldn,t be more than 5',
            'comment.max' => 'comment max charachter count should be 1000'
        ];
    }
}
