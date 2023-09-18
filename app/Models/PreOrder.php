<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model
{
    protected $table  = "pre_orders";
    protected $casts = [
        'colors' => 'array'
    ];

    protected $fillable = [
        'product_id', 'size', 'color', 'count' ,'user_id'
    ];
}
