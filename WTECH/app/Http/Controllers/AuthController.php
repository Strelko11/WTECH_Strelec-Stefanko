<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

public function register(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'phone_number' => 'required|string|max:20',
        'password' => 'required|string|min:8|confirmed',
    ]);
    $user = User::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'],
        'password' => Hash::make($validated['password']),
        'role' => 'user',
    ]);

    Auth::login($user);

    return redirect('/')->with('success', 'Vitaj, ' . $user->first_name . '! Registrácia bola úspešná.');
}


public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();

        // Merge guest cart into user's cart
        $guestCart = session()->get('cart', []);

        foreach ($guestCart as $productId => $item) {
            $cartItem = $user->cartItems()->where('product_id', $productId)->first();

            if ($cartItem) {
                // Update quantity if product already exists in user's cart
                $cartItem->quantity += $item['quantity'];
                $cartItem->save();
            } else {
                // Add new product to user's cart
                $user->cartItems()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                ]);
            }
        }

        // Clear guest cart after merging
        session()->forget('cart');
        \Cookie::queue(\Cookie::forget('cart'));

        if ($user->role === 'admin') {
            return redirect()->route('adminObrazovka')->with('success', 'Vitaj späť, admin!');
        } else {
            return redirect('/')->with('success', 'Úspešne prihlásený!');
        }
    }

    return back()->withErrors([
        'email' => 'Neplatné prihlasovacie údaje.',
    ])->onlyInput('email');
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Boli ste odhlásený.');
}


}
