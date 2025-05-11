<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the cart items for a specific user.
     */
    public function index($userId)
    {
        $cartItems = Cart::with('product')->where('users_id', $userId)->get();
        return response()->json($cartItems);
    }

    /**
     * Add a new item to the cart.
     */
    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required|exists:users,id',
            'products_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::create($request->all());
        return response()->json($cartItem, 201);
    }

    /**
     * Update the quantity of a cart item.
     */
    public function update(Request $request, $id)
    {
        $cartItem = Cart::find($id);

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update($request->all());
        return response()->json($cartItem);
    }

    /**
     * Remove an item from the cart.
     */
    public function destroy($id)
    {
        $cartItem = Cart::find($id);

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $cartItem->delete();
        return response()->json(['message' => 'Cart item removed successfully']);
    }
}