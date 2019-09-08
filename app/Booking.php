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
        "driver_id",
        "pickup_date",
        "drop_date",
        "total",
        "active",
        "created_at",
        "updated_at",
    ];

    public Const ACTIVE = 1;
    public Const DEACTIVE = 0;
    public static $_StatusLabel = [
        self::ACTIVE => "Active",
        self::DEACTIVE => "Deactive",
    ];

    public function getStatus(){
        if($this->active){
            return "Active";
        }
        return "Deactive";
    }

    public function getCustomer(){
        return $this->belongsTo("App\Customer", "customer_id");
    }

    public function getCar(){
        return $this->belongsTo("App\Car", "car_id");
    }

    public function getDriver(){
        return $this->belongsTo("App\Driver", "driver_id");
    }
}
