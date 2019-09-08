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

    public Const ACTIVE = 1;
    public Const DEACTIVE = 0;
    public static $_StatusLabel = [
        self::ACTIVE => "Active",
        self::DEACTIVE => "Deactive",
    ];

    public function getCarQty(){
        return $this->hasMany("App\Car","carmodel_id","carmodel_id");
    }
}
