<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    //
    public function getExpressCheckout(){
        $cart=\Cart::session(auth()->id());
        $cartItems=array_map(function($item){
            return [
                'name' => $item['name'],
                'price'=>$item['price'],
                'qty'=>$item['quantity'],
            ];
        },$cart->getContent()->toarray());
        $checkoutData=[
            'items' => $cartItems,
            'return_url'=>route('paypal.success'),
            'cancel_url'=>route('paypal.cancel'),
            'invoice_id'=>uniqid('', true),
            'invoice_description'=> "Order completed",
            'amount'=>$cart->getTotal(),
            'currency' => 'USD',
        ];

        $provider = new PayPalClient;
        $response = $provider->createOrder($checkoutData);
        dd($response);
//        $orderId = $response['id'];
//        $approvalUrl = $provider->approveUrl($response);
//        return redirect($approvalUrl);


    }

    public function getExpressCheckoutSuccess(Request $request)
    {
        $provider = new PayPalClient;

        $response = $provider->capturePaymentOrder($request->get('token'), $request->get('PayerID'));

        // Process order...

        return 'Payment captured successfully!';
    }
    public function cancel(){
        dd('cancelled');
    }
}
