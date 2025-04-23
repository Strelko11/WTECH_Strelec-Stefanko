<?php

namespace App\Http\Controllers; // Make sure this is present if it's in the app/Http/Controllers folder

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller; // <- this is the key fix
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);


        // Check if product data is correctly fetched
        if (!$product) {
            Log::error("Product not found: {$id}");
        } else {
            Log::info("Product fetched: ", ['id' => $product->id, 'name' => $product->name, 'price' => $product->price]);
        }

        $quantity = $request->input('quantity', 1);

        // Get the cart from session
        $cart = session()->get('cart', []);

        // Log the cart to the console or to the logs
        Log::info('Current cart: ', $cart);

        // Check if the product already exists in the cart
        if (isset($cart[$id])) {
            // Update the quantity of the existing product
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Add the new product to the cart
            $cart[(string)$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->images->first()->image_url ?? 'default.jpg',
            ];
        }
        Log::info('Product to be added: ', [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'image' => $product->images->first()->image_url ?? 'default.jpg',
        ]);


        // Log the updated cart
        Log::info('Updated cart: ', $cart);

        // Save the updated cart back to the session
        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Produkt pridaný do košíka!');
    }





    public function showCart()
{
    // Get the cart and sanitize it
    $cart = array_filter(session('cart', []), function ($item) {
        return isset($item['name'], $item['price'], $item['quantity']) &&
               !is_null($item['name']) && !is_null($item['price']) && !is_null($item['quantity']);
    });

    // Optional: re-save the cleaned cart back to session
    session()->put('cart', $cart);

    $successMessage = session('success') ? session('success') : null;

    return view('kosikView', compact('cart', 'successMessage'));
}

}
