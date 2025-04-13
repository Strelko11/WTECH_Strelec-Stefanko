<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showByCategory($category)
    {
        $products = Product::with('images')
            ->where('category', $category)
            ->get();

        return view('strankaProdukty', compact('products', 'category'));
    }
    public function showProduct(Request $request)
    {
        $id = $request->query('id');

        $product = Product::with('images')->findOrFail($id);

        return view('produktView', compact('product'));
    }
}
