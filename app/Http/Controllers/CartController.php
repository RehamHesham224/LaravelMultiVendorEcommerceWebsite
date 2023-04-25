<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\b;

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
        return redirect()->back()->with('message', 'Added to cart');
    }
    public function index(){
        //cartItems
        $cartItems=\Cart::session(Auth::id())->getContent();
        return view('cart.index',compact('cartItems'));
    }
    public function destroy($itemId){
        //cartItem
        $cartItem=\Cart::session(Auth::id())->remove($itemId);
        return redirect()->back()->with('message', 'Deleted Successfully');
    }
    public function update($itemId){
        //cartItem
        \Cart::session(Auth::id())->update($itemId,[
            'quantity'=>array(
                'relative'=>false,
                'value' => request('quantity'),
            )
        ]);
        return redirect()->back()->with('message', 'Updated Successfully');
    }

    public function checkout(){
        return view('cart.checkout');
    }
    public function applyCoupon(){
        $couponCode=request('coupon_code');
        $couponData = Coupon::where('code',$couponCode)->first();
        if(!$couponData){
            return back()->withMessage('Sorry! Coupon does not exist');
        }
        $condition =new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name,
            'type' => $couponData->type,
            'target' => 'total',
            'value' => $couponData->value,
        ));
        \Cart::session(Auth::id())->condition($condition);
        return redirect()->back()->with('message', 'Coupon Applied');
    }
}
