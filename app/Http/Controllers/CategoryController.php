<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
class CategoryController extends Controller
{

public function create()
{
    $categories = Category::all();

    return view('/products.AddProduct', compact('categories'));
}
}
