<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Procategory;

class ConfirmationController extends Controller
{
    public function index()
    {
    	$categories = Procategory::all();

    	
    	Cart::instance('default')->destroy();
    	return view('ecom.thankyou', compact('categories'));
    }

    public function store()
    {
    	return redirect()->route('home')->with('success_message', 'Thanks For Subscribing');
    }
}
