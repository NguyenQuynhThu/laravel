<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';
    protected $fillable = [
        "customer_id",
        "car_id",
        "pickup_date",
        "drop_date",
        "active",
        "created_at",
        "updated_at",
    ];
}
