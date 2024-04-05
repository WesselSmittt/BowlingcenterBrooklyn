<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index(){
        $products = Product::with('category')->get();
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
        $product = Product::find($id);
        $categories = Category::all();

        if ($product) {
            return view('menu.products.edit', compact('product', 'categories'));
        } else {
            return redirect()->route('product.index')->with('error', 'Product not found');
        }
    }

    public function update(Request $request, string $id)
{
    $product = Product::find($id);

    if ($product) {
        $product->update($request->all());
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    } else {
        return redirect()->route('product.index')->with('error', 'Product not found');
    }
}

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Product deleted successfully');
        } else {
            return redirect()->route('product.index')->with('error', 'Product not found');
        }
    }
    
}
