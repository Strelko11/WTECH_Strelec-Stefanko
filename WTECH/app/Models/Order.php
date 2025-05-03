<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        // Add other fields if needed, e.g. 'total', 'status', etc.
    ];
    public function items()
{
    return $this->hasMany(OrderItem::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
