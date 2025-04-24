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

    $products = $query->paginate(2)->withQueryString();

    return view('strankaProdukty', compact('products', 'category', 'seriesList', 'ramList', 'storageList'));
        }
    public function showProduct(Request $request)
    {
        $id = $request->query('id');

        $product = Product::with('images')->findOrFail($id);

        return view('produktView', compact('product'));
    }
    public function search(Request $request)
{
    $queryBuilder = Product::with('images');

    if ($request->filled('query')) {
        $search = $request->input('query');
        $queryBuilder->where(function ($q) use ($search) {
            $q->where('name', 'ILIKE', "%{$search}%")
              ->orWhere('description', 'ILIKE', "%{$search}%");
        });
    }
    if ($request->filled('min')) {
        $queryBuilder->where('price', '>=', $request->min);
    }

    if ($request->filled('max')) {
        $queryBuilder->where('price', '<=', $request->max);
    }

    if ($request->filled('series')) {
        $queryBuilder->where('series', $request->series);
    }

    if ($request->filled('storage')) {
        $queryBuilder->where('storage', $request->storage);
    }

    if ($request->filled('ram')) {
        $queryBuilder->where('ram', $request->ram);
    }

    if ($request->filled('sort')) {
        $sortOrder = $request->get('sort') === 'desc' ? 'desc' : 'asc';
        $queryBuilder->orderBy('price', $sortOrder);
    }

    $products = $queryBuilder->paginate(2)->withQueryString();

    $seriesList = Product::distinct()->pluck('series');
    $ramList = Product::distinct()->pluck('ram');
    $storageList = Product::distinct()->pluck('storage');

    return view('strankaProdukty', [
        'products' => $products,
        'category' => 'Vyhľadávanie',
        'seriesList' => $seriesList,
        'ramList' => $ramList,
        'storageList' => $storageList,
        'query' => $request->query('query')
    ]);
}

}
