<?php
namespace App\Actions;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;

class StoreOrderAction{
    public $order;
    public function handle(StoreOrderRequest $request){
        //validated shipping data
        $this->order = $request->validated();
        //billing data
        $this->storeBillingData($request);
        //other data
        $this->order['user_id']= auth()->id();
        $this->order['order_number']=uniqid('orderNumber-', true);
        $this->order['grand_total']=\Cart::session(auth()->id())->getTotal();
        $this->order['item_count']=\Cart::session(auth()->id())->getContent()->count();

        if(request('payment_method') === 'paypal'){
            //redirect to PayPal
            $this->order['payment_method'] = 'paypal';
        }
        //

        $this->order =Order::create($this->order);
        //create order items
        $this->storeItemsData();

        return $this->order;

    }
    protected function storeBillingData($request){
        if(!$request->has('billing_full_name')) {
            $this->order['billing_full_name'] = $request['shipping_full_name'];
            $this->order['billing_state'] = $request['shipping_state'];
            $this->order['billing_city'] = $request['shipping_city'];
            $this->order['billing_address'] = $request['shipping_address'];
            $this->order['billing_phone'] = $request['shipping_phone'];
            $this->order['billing_zipcode'] = $request['shipping_zipcode'];
        }else {
            $this->order['billing_full_name'] = $request['billing_full_name'];
            $this->order['billing_state'] = $request['billing_state'];
            $this->order['billing_city'] = $request['billing_city'];
            $this->order['billing_address'] = $request['billing_address'];
            $this->order['billing_phone'] = $request['billing_phone'];
            $this->order['billing_zipcode'] = $request['billing_zipcode'];
        }
    }
    protected function storeItemsData(){
        $cartItems=\Cart::session(auth()->id())->getContent();
        $order=$this->order;
        $cartItems->map(function($item) use ($order){
            $order->items()->attach(
                $item->id,
                [
                    'price'=>$item->price,
                    'quantity'=>$item->quantity
                ]);
            return $item;

        });
    }
}
