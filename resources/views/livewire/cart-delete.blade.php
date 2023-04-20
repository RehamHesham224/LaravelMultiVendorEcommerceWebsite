<div>
{{--    <a href="{{route('cart.destroy', $item['id'])}}" >Delete</a>--}}
    <button type="button" wire:loading.attr="disabled" wire:click="deleteCart({{$item['id']}})" class="btn btn-link" >
    <span wire:loading.remove wire:target="deleteCart({{$item['id']}})">
        <i class="fa fa-trash"></i>Remove
    </span>
        <span wire:loading wire:target="deleteCart({{$item['id']}})">
        <i class="fa fa-trash"></i>Removing
    </span>
    </button>
</div>
