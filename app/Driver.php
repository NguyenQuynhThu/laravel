<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driver';
    protected $primaryKey = 'driver_id';
    protected $fillable = [
        "driver_name",
        "driver_phone",
        "driver_license",
        "active",
        "created_at",
        "updated_at",
    ];
}
