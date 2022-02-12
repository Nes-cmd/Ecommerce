<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use DB;
use App\Models\ViewCounter;
use Carbon\Carbon;
class Dashboard extends Component
{
    public $data = [];
    public function render()
    {
        $data = ViewCounter::all();
        $view  = [];
        
        foreach ($data as $value) {
            array_push($view, $value->view);
        }

        $this->data = json_encode($view);
        return view('livewire.admin.dashboard');
    }
}
