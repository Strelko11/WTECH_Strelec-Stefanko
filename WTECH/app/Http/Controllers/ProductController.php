<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showByCategory(Request $request, $category)
    {
    $query = Product::with('images')->where('category', $category);

    if ($request->filled('min')) {
        $query->where('price', '>=', $request->min);
    }

    if ($request->filled('max')) {
        $query->where('price', '<=', $request->max);
    }
    if ($request->filled('sort')) {
        $sortOrder = $request->get('sort') === 'desc' ? 'desc' : 'asc';
        $query->orderBy('price', $sortOrder);
    }
    if ($request->filled('series')) {
        $query->where('series', $request->series);
    }

    if ($request->filled('storage')) {
        $query->where('storage', $request->storage);
    }

    if ($request->filled('ram')) {
        $query->where('ram', $request->ram);
    }


    $ramList = Product::where('category', $category)->distinct()->pluck('ram');
    $storageList = Product::where('category', $category)->distinct()->pluck('storage');
    $seriesList = Product::where('category', $category)->distinct()->pluck('series');

    $products = $query->paginate(3)->withQueryString();

    return view('strankaProdukty', compact('products', 'category', 'seriesList', 'ramList', 'storageList'));
        }
    public function showProduct(Request $request)
    {
        $id = $request->query('id');

        $product = Product::with('images')->findOrFail($id);

        return view('produktView', compact('product'));
    }

}
