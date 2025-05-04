<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $table = 'orders'; // Specify the correct table name


    protected $fillable = ['user_id', 'shipping_method_id','payment_method_id'];

    public function items()
{
    return $this->hasMany(OrderItem::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
