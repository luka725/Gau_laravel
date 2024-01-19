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
    public function get_products($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return response()->json(['category' => $category->products()], 200);
    }
    public function getCategoryById($categoryId)
    {
        $category = Category::findOrFail($categoryId);

        return response()->json(['category' => $category], 200);
    }
}
