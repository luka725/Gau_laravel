<?php

namespace App\Http\Controllers;
use App\Models\Category;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $categories = Category::all();

        return response()->json($categories);
    }
}
