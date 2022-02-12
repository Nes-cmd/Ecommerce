<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
class ManegeUser extends Component
{
    public function delete($id)
    {
        dd('Delete? why');
        User::where('id', $id)->dalete();
    }
    public function render()
    {
        $customer = Role::where('name','customer')->first()->id;
        $stakeholders = User::where('role_id', '!=',$customer)->get();
        
        return view('livewire.admin.manege-user', compact('stakeholders'));
    }
}
