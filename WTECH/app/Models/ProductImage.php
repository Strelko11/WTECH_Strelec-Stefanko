<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductImage extends Model
{
    
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'product_id',
        'image_url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($image) {
            // získa najväčšie existujúce ID a nastaví ho o +1
            $max = DB::table($image->getTable())->max('id');
            $image->id = $max ? $max + 1 : 1;
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
