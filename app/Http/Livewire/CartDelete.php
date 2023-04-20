<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartDelete extends Component
{
    public $item=[];
    public function mount($item){
        $this->item=$item;
    }
    public function deleteCart(int $cartId){
        $cartItem=\Cart::session(auth()->id())->remove($cartId);
        $this->emit('cartUpdatedOrDeleted');
    }

    public function render()
    {
        return view('livewire.cart-delete');
    }
}
