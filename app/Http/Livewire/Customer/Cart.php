<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Product;

class Cart extends Component
{
    protected $listeners = ['toCart', 'cartSize'];
    
    public $cart_size;

    public function mount()
    {
        // $this->cart_size = session()->has('cart')?sizeof(session()->get('cart')):0;
        $this->cartSize();         
    }
    public function cartSize()
    {
        $this->cart_size = session()->has('cart')?sizeof(session()->get('cart')):0;
    }
    public function toCart($id)
    {
        session()->has('cart')?$cart = session()->get('cart'):$cart = collect();
        $product = \DB::table('products')->where('id', $id)->first();
        $product = (array)$product;
        $product['quantity'] = 1;
        
        if($cart->has($id)){
            $x = $cart[$id];
            $x['quantity'] = $x['quantity'] + 1; 
            $cart[$id] = $x;
        }
        else{
            $cart[$id] =  $product;
        }
        session()->put('cart', $cart);
        $this->cartSize(); 
    }
    public function render()
    {
        return view('livewire.customer.cart');
    }
}
