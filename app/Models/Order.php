<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'user_id', 'transaction_code', 'transaction_photo', 'contact_with', 'order_detail', 'status', 'adress_id', 'deliverer_phone'];
}
