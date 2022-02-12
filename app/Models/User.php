<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id', 'name','email', 'password', 'role_id', 'profile_photo_path', 'phone'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function permissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class, 'user_permission');
    }
    public function hasPermission($name)
    {
        if($this->permissions()->where('permission_name', $name)->first()){
            return true;
        }
        return false;
    }
    public function isStakeHolder()
    {
        $role = \App\Models\Role::where('id', $this->role_id)->first()->name;
            if($role != 'customer'){return true;}
            return false;
    }
}
