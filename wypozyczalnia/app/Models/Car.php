<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['car_class_id', 'brand', 'model', 'registration_number', 'production_year', 'price_per_day', 'is_available', 'created_by'];

    public function carClass()
    {
        return $this->belongsTo(CarClass::class);
    }
}