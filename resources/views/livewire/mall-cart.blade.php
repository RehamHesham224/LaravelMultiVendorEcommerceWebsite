<div>
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
                <td scope="row">{{$item['name']}}</td>
                <td>
                    {{Cart::session(auth()->id())->get($item['id'])->getPriceSum()}}
                </td>
                <td>
                    <div>
{{--                        <livewire:cart-update :item="$item" :key="$item['id']"/>--}}
                    </div>
                </td>
                <td>
                   <div>
                       <livewire:cart-delete :item="$item" :key="$item['id']"/>
                   </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h3> Total Price : ${{Cart::session(auth()->id())->getTotal()}}</h3>
    <a class="btn btn-primary" href="{{route('cart.checkout')}}" role="button">Proceed To checkout</a>

</div>
