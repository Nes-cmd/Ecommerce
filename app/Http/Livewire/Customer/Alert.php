<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Alert extends Component
{
    // protected $listeners = ['listenAlert'];
    public $message = null;
    public $type = null;

    // public function makeAlert($message)
    // {
    //     dd('ok')
    //     $this->type = $message['type'];
    //     $this->message = $message['message'];
    //     // session()->flash('flash', $message['message']);
    // }
    public function render()
    {
        return view('livewire.customer.alert');
    }
}
