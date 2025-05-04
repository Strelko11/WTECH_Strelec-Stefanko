<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{

    public $timestamps = false;


    // Only the 'name' column is mass assignable
    protected $fillable = ['name'];
    
}
