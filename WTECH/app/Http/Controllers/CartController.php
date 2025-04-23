<?php

namespace App\Http\Controllers; // Make sure this is present if it's in the app/Http/Controllers folder

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller; // <- this is the key fix
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;


class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $quantity = $request->input('quantity', 1);

        // Check if the user is logged in
        $user = Auth::user();

        if ($user) {
            // User is logged in, so store cart in the database
            $cartItem = $user->cartItems()->where('product_id', $id)->first();

            if ($cartItem) {
                // Update the existing cart item quantity
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                // Create a new cart item
                $user->cartItems()->create([
                    'product_id' => $id,
                    'quantity' => $quantity,
                ]);
            }
        } else {
            // User is not logged in, store the cart in the session
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += $quantity;
            } else {
                $cart[(string)$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'image' => $product->images->first()->image_url ?? 'default.jpg',
                ];
            }
            session()->put('cart', $cart);
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);  // Store cart in cookie for guests
        }

        return redirect()->route('cart.show')->with('success', 'Produkt pridaný do košíka!');
    }





    public function showCart()
{
    $user = Auth::user();

    if ($user) {
        // Get the user's cart items from the database
        $cart = $user->cartItems()->with('product')->get();
    } else {
        // Fall back to session or cookie cart for guests
        if (!session()->has('cart') && Cookie::has('cart')) {
            session()->put('cart', json_decode(Cookie::get('cart'), true));
        }

        $cart = array_filter(session('cart', []), function ($item) {
            return isset($item['name'], $item['price'], $item['quantity']);
        });

        session()->put('cart', $cart);
    }

    $successMessage = session('success') ? session('success') : null;

    return view('kosikView', compact('cart', 'successMessage'));
}

public function remove($id)
{
    $user = Auth::user();

    if ($user) {
        // User is logged in, delete the cart item from the database
        $user->cartItems()->where('product_id', $id)->delete();
    } else {
        // User is not logged in, remove from session
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);
    }

    return redirect()->back()->with('successMessage', 'Produkt bol odstránený z košíka.');
}

public function updateCart(Request $request)
{
    $user = Auth::user();
    $productId = $request->input('id');
    $quantity = $request->input('quantity');

    if ($user) {
        // Update the quantity for the logged-in user
        $cartItem = $user->cartItems()->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }
    } else {
        // Update the cart for guests (session-based)
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);
        }
    }

    return back()->with('successMessage', 'Cart updated successfully!');
}

}
