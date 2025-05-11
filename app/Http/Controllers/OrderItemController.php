<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the order items.
     */
    public function index()
    {
        $orderItems = OrderItem::with(['order', 'product'])->get();
        return response()->json($orderItems);
    }

    /**
     * Store a newly created order item in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orders_id' => 'required|exists:orders,id',
            'products_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderItem = OrderItem::create($request->all());
        return response()->json($orderItem, 201);
    }

    /**
     * Display the specified order item.
     */
    public function show($id)
    {
        $orderItem = OrderItem::with(['order', 'product'])->find($id);

        if (!$orderItem) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        return response()->json($orderItem);
    }

    /**
     * Update the specified order item in storage.
     */
    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::find($id);

        if (!$orderItem) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        $request->validate([
            'orders_id' => 'exists:orders,id',
            'products_id' => 'exists:products,id',
            'quantity' => 'integer|min:1',
            'price' => 'numeric|min:0',
        ]);

        $orderItem->update($request->all());
        return response()->json($orderItem);
    }

    /**
     * Remove the specified order item from storage.
     */
    public function destroy($id)
    {
        $orderItem = OrderItem::find($id);

        if (!$orderItem) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        $orderItem->delete();
        return response()->json(['message' => 'Order item deleted successfully']);
    }
}