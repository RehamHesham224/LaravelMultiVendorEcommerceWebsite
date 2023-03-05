@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <div class="row">
    {{--     <livewire:product-list/> --}}
           @foreach($products as $product)
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">

                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{$product->name}}</h4>
                                <p class="card-text">{{$product->description}}</p>
                                <h3>${{$product->price}}</h3>
                            </div>

                            <div class="card-body">

                                <a href="{{route('cart.add',$product->id)}}" class="card-link">Add to Card</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               @endforeach
    </div>
</div>
@endsection
