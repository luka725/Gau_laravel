<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::Create(['name' => $data['name']]);
        return response()->json(['category' => $category, 'message' => 'Category created successfully'], 201);
    }
}
