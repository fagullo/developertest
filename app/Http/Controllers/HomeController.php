<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Shows the main view of the app.
     *
     * @return view.
     */
    public function index()
    {
        $user = Auth::user();
        $wishes = $user->wishes->lists('product_id')->toArray();
        $cheapProducts = Product::orderBy('price', 'asc')->limit(10)->get();
        $expensiveProducts = Product::orderBy('price', 'desc')->limit(10)->get();

        return view('products', compact('cheapProducts', 'expensiveProducts', 'wishes'));
    }

    public function guest()
    {
        $cheapProducts = Product::orderBy('price', 'asc')->limit(10)->get();
        $expensiveProducts = Product::orderBy('price', 'desc')->limit(10)->get();

        return view('products', compact('cheapProducts', 'expensiveProducts'));
    }
}
