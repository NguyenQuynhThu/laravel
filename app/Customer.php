<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        "customer_name",
        "customer_email",
        "customer_phone",
        "customer_address",
        "customer_license",
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
}
