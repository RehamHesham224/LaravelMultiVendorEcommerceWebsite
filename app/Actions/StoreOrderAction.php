<?php
namespace App\Actions;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;

class StoreOrderAction{
    public function handle(StoreOrderRequest $request){
        $order = $request->validated();
        if(!$request->has('billing_full_name')) {
            $order['billing_full_name'] = $request['shipping_full_name'];
            $order['billing_state'] = $request['shipping_state'];
            $order['billing_city'] = $request['shipping_city'];
            $order['billing_address'] = $request['shipping_address'];
            $order['billing_phone'] = $request['shipping_phone'];
            $order['billing_zipcode'] = $request['shipping_zipcode'];
        }else {
            $order['billing_full_name'] = $request['billing_full_name'];
            $order['billing_state'] = $request['billing_state'];
            $order['billing_city'] = $request['billing_city'];
            $order['billing_address'] = $request['billing_address'];
            $order['billing_phone'] = $request['billing_phone'];
            $order['billing_zipcode'] = $request['billing_zipcode'];
        }

        $order['user_id']= auth()->id();
        $order['order_number']=uniqid('orderNumber-', true);
        $order['grand_total']=\Cart::session(auth()->id())->getTotal();
        $order['item_count']=\Cart::session(auth()->id())->getContent()->count();

        Order::create($order);

        return $order;

    }
}
