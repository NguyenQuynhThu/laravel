<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'carmodel';
    protected $primaryKey = 'carmodel_id';
    protected $fillable = [
        "carmodel_name",
        "active",
        "created_at",
        "updated_at",
    ];
}
