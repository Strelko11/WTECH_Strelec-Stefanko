<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{

    public $incrementing = false;
    public $timestamps = false;

    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'series',
        'type',
       
        'display_type',
        'display_size',
        'display_resolution',
        'refresh_rate',
        'ram',
        'storage',
        'sim_type',
        'processor',
        'camera_main_mp',
        'camera_ultrawide_mp',
        'camera_telephoto_mp',
        'camera_front_mp',
        'gps',
        'nfc',
        'lte',
        '_5g',
        'usb_c',
        'waterproof_rating',
        'wireless_charging',
        'charging_power_watts',
        'battery_mah',
        'release_year',
        'os',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // získa MAX(id) z tabuľky a nastaví id = max + 1
            $max = DB::table($model->getTable())->max('id');
            $model->id = $max ? $max + 1 : 1;
        });
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}

