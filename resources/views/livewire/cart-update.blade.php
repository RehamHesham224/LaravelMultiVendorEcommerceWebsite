<div>
{{--    <form action="{{route('cart.update',$item['id'])}}">--}}
{{--    <form wire:submit.prevent="updateCart">--}}
{{--    <input wire:model="quantity" name="quantity" type="number">--}}
{{--        <input type="submit" value="save">--}}
{{--    </form>--}}
        <input wire:model="quantity" name="quantity" type="number" wire:change="updateCart">

</div>
