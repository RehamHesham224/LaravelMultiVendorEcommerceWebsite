<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::whereHas('items.shop', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();
        return view('sellers.orders.index', compact('orders'));
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $items = $order->items()->whereHas('shop', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();
        return view('sellers.orders.show', compact('items'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function markAsDelivered(Order $order)
    {
        $items = $order->items()->whereHas('shop', function ($query) {
            $query->where('user_id', auth()->id());
        })->update(['delivered_at' => now()]);
        return redirect('seller/orders')->withMessage('Order Marked Completed');
    }

}
