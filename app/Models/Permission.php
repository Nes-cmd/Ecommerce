<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // use HasFactory;
    protected $fillable = ['id','permission_name'];
    public $timestamps = false;
    // public function users()
    // {
    //     return $this->belongsToMany(App\Models\User::class);
    // }
}
