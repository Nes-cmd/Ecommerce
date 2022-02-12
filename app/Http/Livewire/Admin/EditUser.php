<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Permission;
use DB;
use App\Models\Role;

class EditUser extends Component
{
    public $allowed;
    public $user;
    protected $rules = [
        'user.name' => ['required', 'string', 'max:50'],
        'user.phone' => ['required', 'numeric'],
        'user.email' => ['required', 'string', 'max:40'],
    ];
    public function mount($id)
    {
        $this->user = (array)DB::table('users')->where('id', $id)->first();
        $this->role = Role::where('id', $this->user['role_id'])->first();
        $permission = DB::table('user_permission')
                        ->select('permission_id')
                        ->where('user_id', $this->user['id'])
                        ->get()
                        ->groupBy('permission_id');
        $permission = $permission->map(function($p){
            return (string)$p[0]->permission_id;
        });
        $this->allowed = $permission;
    }
    public function save()
    {
        $this->validate();
        $user = User::where('id', $this->user['id'])->first();
        $user->update($this->user);
        $user->permissions()->sync($this->allowed);
        $this->emit('listenAlert', ['message' => 'Updated successfully!', 'type' => 'success']);
    }
    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.admin.edit-user', compact(['permissions']));
    }
}
