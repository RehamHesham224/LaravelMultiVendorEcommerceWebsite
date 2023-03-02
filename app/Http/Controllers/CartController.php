<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function add(Product $product){
        \Cart::session(Auth::id())->add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product
            ));
        return redirect()->route('cart.index')->with('message', 'Added to cart');
    }
    public function index(){
        //cartItems
        $cartItems=\Cart::session(Auth::id())->getContent();
        return view('cart.index',compact('cartItems'));
    }
    public function destroy($cartItem){
        //cartItem
    }
    public function update($itemId){
        //cartItem
//        Cart::session(Auth::user())->update($cartItem->id,[
//            'quantity' => ,
//            'price' => 98.67
//        ]);
    }
}
