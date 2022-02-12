<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewCounter extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'month', 'view'];
    protected $guarded = [];
}
