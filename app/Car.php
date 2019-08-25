<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';
    protected $primaryKey = 'car_id';
    protected $fillable = [
        "car_name",
        "model_id",
        "car_plate",
        "car_color",
        "manufacture_year",
        "active",
        "created_at",
        "updated_at",
    ];
}
