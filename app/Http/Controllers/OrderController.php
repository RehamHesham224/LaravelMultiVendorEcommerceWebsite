<?php

namespace App\Http\Controllers;

use App\Actions\StoreOrderAction;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{

    public function store(StoreOrderRequest $request, StoreOrderAction $action)
    {
        $order = $action->handle($request);
        //payment
        if (request('payment_method') === 'paypal') {
            //redirect to PayPal
            return redirect()->route('paypal.checkout', $order->id);
        }
        //empty cart
        \Cart::session(auth()->id())->clear();
        //send email to customer
        //take user to thank you page
        return redirect()->route('home')->with('message', 'order has been placed');

//        dd($order);
    }


}
