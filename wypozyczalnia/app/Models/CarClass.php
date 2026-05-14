<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarClass extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
