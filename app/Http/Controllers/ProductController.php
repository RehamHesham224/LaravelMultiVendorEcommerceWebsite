<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryId=request('category_id');
        $categoryName=null;
        if($categoryId){
            $category=Category::find($categoryId);
            $categoryName=$category->name;
            $products=$category->allProducts( );
        }else{
            $products=Product::take(10)->get();
        }
        return view('products.index',compact('products','categoryName','products'));
    }

    public function show(Product $product){
        return view('products.show', compact('product'));
    }
    /**
     * search the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return
     */
    public function search(Request $request)
    {
        $query=$request['query'];
        $products=Product::where('name','LIKE',"%$query%")->paginate(10);
        return view('products.catalog',compact('products'));
    }
}
