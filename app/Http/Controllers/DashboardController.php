<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function adminDashboard()
    {
        // Check if the user has an 'admin' role
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized access');
        }

        return view('dashboards.admin', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Display the seller dashboard.
     */
    public function sellerDashboard()
    {
        // Check if the user has a 'seller' role
        if (Auth::user()->role !== 'seller') {
            return redirect('/')->with('error', 'Unauthorized access');
        }

        return view('dashboards.seller', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Display the customer dashboard.
     */
    public function customerDashboard()
    {
        // Check if the user has a 'customer' role
        if (Auth::user()->role !== 'customer') {
            return redirect('/')->with('error', 'Unauthorized access');
        }

        return view('dashboards.customer', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Display the public home page.
     */
    public function index()
    {
        return view('home');
    }
}