<x-mail::message>
# Invoice Paid

Thanks for the purchase

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
           @foreach($order->items as $item)
               <tr>
                   <td>{{$item->name}}</td>
                   <td>{{$item->quantity}}</td>
                   <td>{{$item->price}}</td>
               </tr>
           @endforeach
        </tbody>
    </table>
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
