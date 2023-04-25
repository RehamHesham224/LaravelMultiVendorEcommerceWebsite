{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--    --}}{{--     <livewire:product-list/> --}}
{{--           @foreach($products as $product)--}}
{{--            <div class="col-lg-4 col-md-6 mb-3">--}}
{{--                <div class="card">--}}

{{--                    <div class="card-body">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <h4 class="card-title">{{$product->name}}</h4>--}}
{{--                                <p class="card-text">{{$product->description}}</p>--}}
{{--                                <h3>${{$product->price}}</h3>--}}
{{--                            </div>--}}

{{--                            <div class="card-body">--}}

{{--                                <a href="{{route('cart.add',$product->id)}}" class="card-link">Add to Card</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--               @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
@extends('layouts.front')

@section('content')

    <div class="pl-200 pr-200 overflow clearfix">

        <div class="categori-menu-slider-wrapper clearfix">
            <div class="categories-menu">

                <div class="category-heading">
                    <h3> All Departments <i class="pe-7s-angle-down"></i></h3>
                </div>

                <x-category_list :categories="$categories"/>

            </div>

            <div class="menu-slider-wrapper">

                <div class="menu-style-3 menu-hover text-center">
                    <x-navbar/>
                </div>

                <div class="slider-area">
                    <x-slider/>
                </div>

            </div>

        </div>

    </div>

    <div class="electronic-banner-area">
        <div class="custom-row-2">
            <x-dummy_product/>
            <x-dummy_product/>
            <x-dummy_product/>

        </div>
    </div>

    <div class="electro-product-wrapper wrapper-padding pt-95 pb-45">

        <div class="container-fluid">

            <div class="section-title-4 text-center mb-40">
                <h2>Top Products</h2>
            </div>

            <div class="top-product-style">

                <div>

                    <div id="electro1">
                        <div class="custom-row-2">

                            @foreach($products as $product)
                                <x-product.single_product :product="$product" />
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
