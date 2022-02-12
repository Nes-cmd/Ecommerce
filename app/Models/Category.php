<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'category_name', 'created_by', 'onfront_page'];
    public $timestamps = false;
    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class);
    }
}
