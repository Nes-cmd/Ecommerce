<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use DB;
class Toprated extends Component
{
    public $message;
    public function mount($message = null){
        $this->message = $message?$message:'Toprated products';
    }
    public function buynow($id)
    {
        $this->emit('toCart', $id);
        sleep(0.2);
        redirect()->route('customer.proceed');
    }
    public function render()
    {
        $toprateds = DB::table('products')->where('rate', '>=', 3.9)->take(15)->get();
        return view('livewire.customer.toprated', compact('toprateds'));
    }
} 
