<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Product;
use App\Models\Order;

class MainPage extends Component
{
    public function delete($id)
    {
        $order = \DB::table('orders')
                        ->whereJsonLength("order_detail->$id", ">", 0)
                        ->first();
        if ($order != null) {
            $this->emit('listenAlert', ['message' => 'The product is ordered by customer, process it please!', 'type' => 'info', 'bg'=>'red']);
            return;
        }
        Product::where('id', $id)->delete();
        $this->emit('listenAlert', ['message' => 'Deleted!', 'type' => 'info']);
        
    }
    public function render()
    {
        $products = Product::all();
        return view('livewire.product.main-page', compact('products'));
    }
}
