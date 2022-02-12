<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInstruction extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'method_name', 'first_instruction', 'second_instruction'];
    public $timestamps = false;
}
