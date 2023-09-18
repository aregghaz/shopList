<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addreess extends Model
{
    protected $table = "addreesses";
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'address', 'email','city','post_code', 'description', 'payment_method','order_id'
    ];
    public function Orders()
    {
        return $this->hasMany("App\Models\Orders",'address_id','id');
    }
}
