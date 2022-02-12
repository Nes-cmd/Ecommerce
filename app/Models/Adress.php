<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = ['id', 'country', 'region', 'zone', 'street', 'street_2', 'posta_number', 'map_location', 'phone', 'zipcode'];
    
}
