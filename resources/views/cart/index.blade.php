@extends('layouts.app')
@section('content')
   <div class="container">
       @if(session('message'))
           <div class="alert alert-success">
               {{session('message')}}
           </div>
       @endif
       @if(session('message'))
           <div class="alert alert-green alert-dismiss">{{session('message')}}</div>
       @endif
       <h3>Your Cart</h3>
       <table class="table">
           <thead>
           <tr>
               <th>Name</th>
               <th>Price</th>
               <th>Quantity</th>
               <th>Action</th>
           </tr>
           </thead>
           <tbody>
           @foreach($cartItems as $item)
               <tr>
                   <td scope="row">{{$item->name}}</td>
                   <td>
                       {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                   </td>
                   <td>
                       <form action="{{route('cart.update',$item->id)}}">
                            <input name="quantity" type="number" value="{{$item->quantity}}">

                            <input type="submit" value="save">
                       </form>
                   </td>
                   <td>
                       <a href="{{route('cart.destroy', $item->id)}}">Delete</a>
                   </td>
               </tr>
           @endforeach
           </tbody>
       </table>
       <h3> Total Price : ${{Cart::session(auth()->id())->getTotal()}}</h3>
        <a class="btn btn-primary" href="{{route('cart.checkout')}}" role="button">Proceed To checkout</a>
   </div>
@endsection
