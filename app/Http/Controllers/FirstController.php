<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function MainPages()
    {

    
        $result = Category::all();

        return view('welcome', ['categories' => $result]);
    }


    public function GetCategoryProducts($catid)
    {

        $Categories = Category::all();
        $products = Product::where('category_id', $catid)->get();

        return view('products.product', compact('Categories', 'products'))->with('category_id', $catid);
    }

    public function ShowCategories()
    {
        $Categories = Category::all();
        return view('categories.category', compact('Categories'));
    }



    public function getAllProducts()
    {
        $categories = category::all();
        $products = product::all();

        return view('products.Product', ['Categories' => $categories, 'products' => $products])->with('category_id', null);;
    }
    public function search( Request $request){

        $keyword = $request->search;

    $categories = Category::all();

    $products = Product::where('name', 'like', '%' . $keyword . '%')->get();

    return view('products.product',['Categories' => $categories, 'products' => $products]);
}




}