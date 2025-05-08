<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

public function index(Request $request)
{
    $products = Product::with('images');

    if ($request->filled('search')) {
        $products->where(function ($query) use ($request) {
            $searchTerm = $request->input('search');
            $query->where('name', 'ILIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'ILIKE', "%{$searchTerm}%");
        });
    }
    if ($request->filled('type') && $request->input('type') !== 'all') {
        $products->where('type', $request->input('type'));
    }
    if ($request->filled('category') && $request->input('category') !== 'all') {
        $products->where('category', $request->input('category'));
    }
    if ($request->filled('price')) {
        switch ($request->input('price')) {
            case 'low':
                $products->orderBy('price', 'asc');
                break;
            case 'high':
                $products->orderBy('price', 'desc');
                break;
            case '400':
                $products->where('price', '<=', 400);
                break;
            case '700':
                $products->where('price', '<=', 700);
                break;
            case '1000':
                $products->where('price', '>', 1000);
                break;
        }
    }
    $types = Product::distinct()->pluck('type');
    $categories = Product::distinct()->pluck('category');

    // Stránkovanie
    $products = $products->paginate(3)->withQueryString();

    return view('adminObrazovka', compact('products', 'types', 'categories'));
}

}
