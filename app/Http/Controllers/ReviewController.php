<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display all reviews for a specific product.
     */
    public function index($productId)
    {
        $reviews = Review::with('user')->where('products_id', $productId)->get();
        return response()->json($reviews);
    }

    /**
     * Add a new review for a product.
     */
    public function store(Request $request)
    {
        $request->validate([
            'comments' => 'required|string',
            'users_id' => 'required|exists:users,id',
            'products_id' => 'required|exists:products,id',
        ]);

        $review = Review::create($request->all());
        return response()->json($review, 201);
    }

    /**
     * Update an existing review.
     */
    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $request->validate([
            'comments' => 'string',
        ]);

        $review->update($request->all());
        return response()->json($review);
    }

    /**
     * Remove a review.
     */
    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();
        return response()->json(['message' => 'Review deleted successfully']);
    }
}