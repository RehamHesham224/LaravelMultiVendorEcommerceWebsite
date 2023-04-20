<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MallCart extends Component
{
    public $cartItems=[];
    protected $listeners=[
        'cartUpdatedOrDeleted'=>'onCartUpdatedOrDeleted',
    ];
    public function mount(){
        $this->cartItems=\Cart::session(auth()->id())->getContent()->toArray();
    }
    public function onCartUpdatedOrDeleted(){
        $this->mount();
    }
//    public function onCartDeleted(){
//        $this->mount();
//    }
    public function render()
    {
        return view('livewire.mall-cart');
    }
}
