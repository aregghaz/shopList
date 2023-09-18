<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    protected $fillable = [
        'product_id', 'user_id', 'status', 'order_id', 'count','amount','company_id', 'address_id','size'
    ];
    protected $casts = [
        'colors' => 'array',

    ];
    public function Product()
    {
        return $this->hasOne("App\Models\Products", 'id', 'product_id');
    }
    public function Address()
    {
        return $this->hasOne("App\Models\Addreess", 'id','address_id');
    }
    public function ProductsName()
    {
        return $this->hasOne("App\Models\ProductName", 'id','product_id');
    }
}
