<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Product;
use DB;
use Carbon\Carbon;
use App\Models\ViewCounter;
class Detail extends Component
{
    public $product;
    public $rate;
    public $visible;
    public function mount($id)
    {
        $this->product = Product::where('id', $id)->first();
        $month = explode('-', Carbon::now())[1];
        // $data = json_decode($product->view);
        // $data->$month = $data->$month + 1;
        // $product->view = json_encode($data);
        // $product->save();
        // $this->product = $product;
        $viewCounter = ViewCounter::where('month', $month)->first();
        $viewCounter->view = $viewCounter->view + 1;
        $viewCounter->save();   
        $this->rate = $this->product->rate;
    }
    public function buynow($id)
    {
        $this->emit('toCart', $id);
        redirect()->route('customer.proceed');
    }
    public function star($rate)
    {
        $this->rate = $rate;
        $this->visible = true;
    }
    public function rate()
    {
        $vote = $this->product->vote;
        $oldRate = $this->product->rate;
        $newRate = ($vote*$oldRate + $this->rate)/($vote+1);
        $this->product->update(['rate' => $newRate, 'vote' => $vote+1]);
        $this->visible = false;
        $this->emit('listenAlert', ['message' => 'Tankyou for your feedback.', 'type' => 'info']);
        $this->mount($this->product->id);
    }
    public function render()
    {
        $toprateds = DB::table('products')->where('rate', '>=', 3.9)->take(15)->get();
        return view('livewire.customer.detail', compact('toprateds'));
    }
}
