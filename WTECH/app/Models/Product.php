<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function cartItems()
{
    return $this->hasMany(CartItem::class);
}


}


