<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::with('products.images')->get();
        return view('home', compact('categories'));
    }
}
