<?php

namespace App\Http\Controllers;

use App\Procategory;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Procategory::all();
        return view('layouts.partial.nav', compact('categories'));
    }

    public function show($id)
    {
        $categories = Procategory::all();
        // $category = Procategory::where($id, 1)->with(['products' => function($query){
        //     $query->simplePaginate(2);
        // }]);
        // $test = $category->with('products')->orderBy('id', 'DESC');
        // return var_dump($test);
        $category_name =Procategory::find($id);
        $category = Procategory::find($id)->products()->orderBy('id', 'DESC')->get();
        return view('ecom.category', compact('category', 'categories','category_name'));
    }


}
