<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);
        $user = Auth::user();

        if ($user) {
            // User is logged in, so store cart in the database
            $cartItem = $user->cartItems()->where('product_id', $id)->first();

            if ($cartItem) {
                // Update the existing cart item quantity
                $cartItem->quantity += $quantity;
                $cartItem->save();
                Log::info('Cart item updated for user.', ['user_id' => $user->id, 'product_id' => $id]);
            } else {
                // Create a new cart item
                $user->cartItems()->create([
                    'product_id' => $id,
                    'quantity' => $quantity,
                ]);
                Log::info('Cart item created for user.', ['user_id' => $user->id, 'product_id' => $id]);
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
        Log::info('showCart method accessed');  // Add this line to check if it's being called


        if ($user) {
            // Clear the session cart and cookie if any
            if (session()->has('cart')) {
                session()->forget('cart');
                Cookie::queue(Cookie::forget('cart'));
            }

            // Fetch cart items from the database for the logged-in user
            $cart = CartItem::with('product')
                ->where('user_id', $user->id)
                ->get();

            // If cart is found in the database, store it in the session
            if ($cart->isNotEmpty()) {
                session(['cart' => $cart]);
            }

            Log::info('User cart items fetched from database', ['cart' => $cart]);
        } else {
            // If the user is not logged in, load the cart from session or cookie
            // First check if the session has a cart, then check cookie
            if (!session()->has('cart') && Cookie::has('cart')) {
                session()->put('cart', json_decode(Cookie::get('cart'), true));
            }

            // Filter and clean the session cart items
            $cart = array_filter(session('cart', []), function ($item) {
                return isset($item['name'], $item['price'], $item['quantity']);
            });

            Log::info('Guest user');
            Log::info('Guest cart items', ['cart' => $cart]);
        }

        // Optional: show success flash message
        $successMessage = session('success') ?? null;
        Log::info('Current Cart:', ['cart' => session('cart')]);

        return view('kosikView', compact('cart', 'successMessage'));
    }




    public function remove($id)
{
    $user = Auth::user();
    Log::info('Product ID to remove:', ['id' => $id]);

    if ($user) {
        // User is logged in, delete the cart item from the database
        $cartItem = $user->cartItems()->where('product_id', $id)->first();

        if ($cartItem) {
            Log::info('Deleting cart item', ['user_id' => $user->id, 'product_id' => $id]);
            $cartItem->delete();
        } else {
            Log::warning('Cart item not found for deletion.', ['user_id' => $user->id, 'product_id' => $id]);
        }
    } else {
        // User is not logged in, remove from session
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);
        } else {
            Log::warning('Cart item not found in session.', ['product_id' => $id]);
        }
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
