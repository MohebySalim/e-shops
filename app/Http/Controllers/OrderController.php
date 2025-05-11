<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $orders = Order::with(['user', 'payment', 'items.product'])->get();
        return response()->json($orders);
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'total_amount' => 'required|numeric',
            'shipping_address' => 'required|string',
            'billing_address' => 'string|nullable',
            'users_id' => 'required|exists:users,id',
            'payments_id' => 'exists:payments,id',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::with(['user', 'payment', 'items.product'])->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order);
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $request->validate([
            'total_amount' => 'numeric',
            'shipping_address' => 'string',
            'billing_address' => 'string|nullable',
            'users_id' => 'exists:users,id',
            'payments_id' => 'exists:payments,id',
        ]);

        $order->update($request->all());
        return response()->json($order);
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}