<?php

namespace App\Http\Controllers;
use App\Mail\OrderPaid;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    public function getExpressCheckout($orderId){
        $provider = new PayPalClient;

        try {
            $response = $provider->createOrder($this->checkoutData($orderId));
            $approvalUrl = $provider->approveUrl($response);
            return redirect($approvalUrl);
        } catch (\GuzzleHttp\Exception\InvalidArgumentException $e) {
            //error page
        dd('Error capturing payment: ' . $e->getMessage());
        }
    }

    private function checkoutData($orderId): array
    {
        $cart = \Cart::session(auth()->id());
        $cartItems = array_map(function($item){
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ];
        }, $cart->getContent()->toArray());
        $checkoutData = [
            'items' => $cartItems,
            'return_url' => route('paypal.success',$orderId),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid('', true),
            'invoice_description' => "Order completed",
            'amount' => $cart->getTotal(),
            'currency' => 'USD',
        ];
        return $checkoutData;
    }

    public function getExpressCheckoutSuccess(Request $request,$orderId)
    {
        $provider = new PayPalClient;
        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $checkoutData = $this->checkoutData($orderId);

        $response = $provider->captureOrder($token, $checkoutData);

        if (in_array(strtoupper($response->result->status), ['COMPLETED', 'APPROVED'])) {
            $paymentStatus = $provider->captureOrder($response->result->id, $checkoutData);
            $status = $paymentStatus->result->status;


            $order=Order::find($orderId);
            $order->is_paid=1;
            $order->save();

            //send email
            Mail::to($order->user->email)->send(new OrderPaid($order));

//            dd('Payment captured successfully!');
            return redirect()->route('home')->with('message','Payment Successfully');
        }

//            dd('Payment not captured!');
        return redirect()->route('home')->with('message',' something went wrong');
    }

    public function cancel(){
        dd('Cancelled!');
    }
}
