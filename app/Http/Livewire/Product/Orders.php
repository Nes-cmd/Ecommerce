<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use App\Models\Adress;

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class Orders extends Component
{
    public $ordered;
    public $order = [];
    public $deliverer = [];
    public $adress;
    public function mount()
    {
        $this->adress = collect();
    }
    public function makeShipment($id)
    {
        $this->validate(
            ["deliverer.$id" => "required|numeric|digits_between:9,12"],[
                "deliverer.$id.required" => "Please enter the phone of the person who delivers the order!",
                "deliverer.$id.numeric" => "Deliverer phone should be a number, no space, no character...",
                "deliverer.$id.digits_between" => "Phone number's must be between 9 and 12 digits.",
            ]
        );
        $update = Order::where('id',$id)->first();
        $updated = $update->update(['status' => 'shiped', 'deliverer_phone' => $this->deliverer[$id]]);
        $this->emit('listenAlert', ['message' => 'Status of order is updated successfuly', 'type' => 'success', 'bg'=> 'green']);
    
        // Notify with email
        $user = $update->contact_with;
        Mail::to($user)->send(new OrderShipped($update,'Your order is touched!'));
    }
    public function loadAdress($adressId, $id)
    {
        $adress = Adress::where('id', $adressId)->first()->toArray();
        $this->adress->put($id, $adress);
    }
    public function submit($id, $index)
    {
        $this->validate(
            ["order.$id" => "required"],["order.$id.required" => "Please choose the status of payment!"]);
        $updated = Order::where('id',$id)->update(['status' => $this->order[$id]]);
        if ($this->order[$id] == 'success') {
            $adress = Adress::where('id', $this->ordered[$index]->adress_id)->first();
            $this->adress->put($id, $adress);
        }
        $this->emit('listenAlert', ['message' => 'Status of payment is updated', 'type' => 'success']);
    }

    public function render()
    {
        $orders = Order::where('status', '!=', 'shiped')->get();
        $ordered = $orders->map(function($product){
            $x = json_decode($product->order_detail);
            foreach($x as $key => $value) {
                $temp[$key] = Product::where('id', $key)->first();
                $temp[$key]['quantity'] = $value;
                $product->product = $temp;
            }
            return $product;
        });
        $this->ordered = $ordered;
        return view('livewire.product.orders');
    }
}
 