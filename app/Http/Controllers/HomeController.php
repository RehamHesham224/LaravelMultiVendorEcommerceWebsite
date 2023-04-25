<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Product::with('shop.owner')->take(8)->get();
        $categories=Category::with('children.children')->whereNull('parent_id')->get();
//        $cart=Cart::content();
        return view('home',compact('products','categories'));
    }
}
