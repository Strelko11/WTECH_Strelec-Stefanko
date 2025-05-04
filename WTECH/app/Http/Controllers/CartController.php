<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use App\Models\User;

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
            // User is not logged in, store the cart in the session and cookie
            $cart = session()->get('cart', []);

            // Check if cart item exists, and update or add it
            if (isset($cart[(string)$id])) {
                $cart[(string)$id]['quantity'] += $quantity;
            } else {
                $cart[(string)$id] = [
                    'product_id' => $id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'image' => $product->images->first()->image_url ?? 'default.jpg',
                ];
            }

            // Store updated cart in session
            session()->put('cart', $cart);

            // Store cart in cookie for guest (expires in 7 days)
            Cookie::queue('cart', json_encode($cart), 60 * 24 * 7);
        }

        //Log::info('Added to cart', ['cart' => $cart]);

        return redirect()->route('cart.show')->with('success', 'Produkt pridaný do košíka!');
    }



    public function showCart()
    {
        $user = Auth::user();
        Log::info('showCart method accessed');

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
                Log::info('User cart items fetched from database', ['cart' => $cart]);
            }
        } else {
            // If the user is not logged in, load the cart from session or cookie
            $cart = session()->get('cart', []);

            if (empty($cart) && Cookie::has('cart')) {
                // Retrieve and decode cart from the cookie if session cart is empty
                $cartFromCookie = json_decode(Cookie::get('cart'), true);
                if ($cartFromCookie) {
                    session()->put('cart', $cartFromCookie);
                    Log::info('Loaded cart from cookie for guest', ['cart' => $cartFromCookie]);
                } else {
                    Log::warning('No cart found in cookie for guest.');
                }
            }

            // Get the cart and sanitize it
            $cart = array_filter($cart, function ($item) {
                return isset($item['product_id'], $item['name'], $item['price'], $item['quantity']) &&
                    !is_null($item['product_id']) && !is_null($item['name']) && !is_null($item['price']) && !is_null($item['quantity']);
            });

            // Re-save sanitized cart back to session
            session()->put('cart', $cart);

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
    public function clearCart(Request $request)
    {
        $userId = $request->user()?->id; // ✅ with null-safe operator
        $shippingMethodId = (int) $request->input('shipping_method');
        $paymentMethodId = (int) $request->input('payment_method');
        Log::info('Shipping Method 1ID: ' . $shippingMethodId);
        Log::info('Payment Method 1ID: ' . $paymentMethodId);


        /*$shippingMethodIdd = trim($shippingMethodId);
        $paymentMethodIdd = trim($paymentMethodId);
        Log::debug('Shipping Method 2ID: ' . $shippingMethodIdd);
        Log::debug('Payment Method 2ID: ' . $paymentMethodIdd);

        $shippingMethodIddd= (int) $shippingMethodIdd;
        $paymentMethodIddd = (int) $paymentMethodIdd; // Cast to integer

        // Log the casted values and their types
        Log::debug('Casted Shipping Method IDddd: ' . $shippingMethodIddd);
        Log::debug('Casted Payment Method IDdddd: ' . $paymentMethodIddd);
*/

        Log::debug('clearCart method triggered', ['user_id' => $userId]);
        // ✅ Submit the order FIRST (if cart exists)
        $cart = session()->get('cart', []);

        //if (empty($cart)) {
            //return response()->json(['error' => 'Košík je prázdny.'], 400);
        //}

        if ($userId) {
            Log::debug('clearCart method triggered', ['user_id' => $userId]);
            Log::info('Shipping Method 2ID: ' . $shippingMethodId);
            Log::info('Payment Method 2ID: ' . $paymentMethodId);

            $order = Order::create([
                'user_id' => $userId,
                'shipping_method_id' => $shippingMethodId,
                'payment_method_id' => $paymentMethodId,
            ]);

            foreach ($cart as $item) {
                $price = is_array($item) ? ($item['price'] ?? 0) : ($item->product->price ?? 0);
                $quantity = is_array($item) ? ($item['quantity'] ?? 0) : ($item->quantity ?? 0);

                if ($price > 0 && $quantity > 0) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'quantity' => $quantity,
                        'price' => $price * $quantity,
                    ]);
                } else {
                    Log::error('Invalid cart item detected', ['cart_item' => $item]);
                }
            }

            Log::info('Order submitted and stored.', ['order_id' => $order->id]);
        } else {
            Log::info('Shipping Method 3ID: ' . $shippingMethodId);
            Log::info('Payment Method 3ID: ' . $paymentMethodId);
            Log::info('Order submission skipped - user not logged in.');
        }

        // ✅ Then clear the cart
        if ($userId) {
            CartItem::where('user_id', $userId)->delete();
            Log::info('User cart cleared from database.', ['user_id' => $userId]);
        } else {
            session()->forget('cart');
            Cookie::queue('cart', json_encode([]), 60 * 24 * 7);
            $cart = session()->get('cart', []);
            Log::info('Session cart cleared.', ['cart' => $cart]);
        }

        // ✅ Final response
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Košík bol úspešne vymazaný'
            ], 200);
        }
        // Redirect the user back to the homepage or the desired page
        return redirect('/')->with('message', 'Cart cleared successfully.');
    }
}
