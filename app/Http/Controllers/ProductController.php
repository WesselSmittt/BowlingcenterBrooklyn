<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index(){
        $products = Product::all();
        return view('menu.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('menu.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return redirect()->route('product.index'); 
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
