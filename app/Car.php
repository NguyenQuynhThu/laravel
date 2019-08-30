<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';
    protected $primaryKey = 'car_id';
    protected $fillable = [
        "carmodel_id",
        "car_plate",
        "car_color",
        "manufacture_year",
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
//    public function getStatus(){
//        if($this->active){
//            return "Active";
//        }
//        return "Deactive";
//    }
}
