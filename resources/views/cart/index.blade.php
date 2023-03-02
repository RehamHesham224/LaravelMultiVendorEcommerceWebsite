@extends('layouts.app')
@section('content')
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
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td scope="row">{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->qty}}</td>
                </tr>

        </tbody>
    </table>
@endsection
