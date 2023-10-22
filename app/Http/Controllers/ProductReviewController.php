<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductReviewRequest;

use Illuminate\Support\Facades\Storage;

class ProductReviewController extends Controller
{
    public function review(ProductReviewRequest $request){
        $data = $request->validated();
        Storage::append('review.json', json_encode($data));
        return [
            'Success' => 'Review successfully added'
        ];
    }
}
