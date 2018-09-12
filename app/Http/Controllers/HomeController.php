<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procategory;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3'
        ]);
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->get();
        $categories = Procategory::all();
        return view('ecom.search', compact('categories', 'products'))->with('success_message', 'Must be at least 3 Character');
    }
}
