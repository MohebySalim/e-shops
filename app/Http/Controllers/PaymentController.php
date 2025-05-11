<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display all payments for a specific user.
     */
    public function index($userId)
    {
        $payments = Payment::where('users_id', $userId)->get();
        return response()->json($payments);
    }

    /**
     * Add a new payment.
     */
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string|max:45',
            'status' => 'required|string|max:45',
            'amount' => 'required|numeric',
            'users_id' => 'required|exists:users,id',
        ]);

        $payment = Payment::create($request->all());
        return response()->json($payment, 201);
    }

    /**
     * Update an existing payment.
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        $request->validate([
            'payment_method' => 'string|max:45',
            'status' => 'string|max:45',
            'amount' => 'numeric',
        ]);

        $payment->update($request->all());
        return response()->json($payment);
    }

    /**
     * Remove a payment.
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        $payment->delete();
        return response()->json(['message' => 'Payment deleted successfully']);
    }
}