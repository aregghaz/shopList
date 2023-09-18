<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table  = "statistics";
    protected $fillable = [
        'product_id',  'company_id', 'count'
    ];


    public function  Product()
    {
        return $this->hasOne("App\Models\Products",'id','product_id');
    }
    public function ProductName()
    {
        return $this->hasOne("App\Models\ProductName",'id','product_id');
    }
}
