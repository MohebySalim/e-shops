<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();
        return response()->json($products);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'product_price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'image' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'brands_id' => 'required|exists:brands,id',
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = Product::with(['category', 'brand'])->find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'product_price' => 'numeric',
            'stock_quantity' => 'integer',
            'image' => 'string|max:255',
            'categories_id' => 'exists:categories,id',
            'brands_id' => 'exists:brands,id',
        ]);

        $product->update($request->all());
        return response()->json($product);
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}