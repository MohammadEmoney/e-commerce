<?php

namespace App\Http\Controllers;

use App\Procategory;
use App\Product;
use App\Comment;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function index()
    {
        $response = new \Illuminate\Http\Response('Welcome');
        $response->withCookie(cookie('Welcome', 'Welcome', 1440));
        $products = Product::orderBy('id', 'DESC')->select("*")->simplePaginate(8);
        $categories = Procategory::all();
        return view('ecom.index', compact('products', 'categories', 'response'));
    }

    public function show($id)
    {
        $products = Product::find($id);
        $categories = Procategory::all();
        $comments = Comment::with('product')->where('product_id' ,'=' ,$id)->get();

        $category = Product::with('categories')->where('procategory_id' ,'=' ,$products->procategory_id)->simplePaginate(4);
        // return $comments;
        return view('ecom.page', compact('products','categories', 'category', 'comments'));
    }

    public function store(Request $request, $product_id)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required'
        ]);

        $this->comment->name = $request->name;   
        $this->comment->body = $request->body;   
        $this->comment->email = $request->email;   
        $this->comment->product_id = $product_id;   

        $this->comment->save();

        return redirect()->route('show-page', ['id' => $product_id]);
    }
}
