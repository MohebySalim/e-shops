<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display the wishlist items for a specific user.
     */
    public function index($userId)
    {
        $wishlistItems = Wishlist::with('product')->where('users_id', $userId)->get();
        return response()->json($wishlistItems);
    }

    /**
     * Add a new item to the wishlist.
     */
    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required|exists:users,id',
            'products_id' => 'required|exists:products,id',
        ]);

        $wishlistItem = Wishlist::create($request->all());
        return response()->json($wishlistItem, 201);
    }

    /**
     * Remove an item from the wishlist.
     */
    public function destroy($id)
    {
        $wishlistItem = Wishlist::find($id);

        if (!$wishlistItem) {
            return response()->json(['message' => 'Wishlist item not found'], 404);
        }

        $wishlistItem->delete();
        return response()->json(['message' => 'Wishlist item removed successfully']);
    }
}