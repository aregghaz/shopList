<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table  = "reviews";
    protected $fillable = [
        'review',  'product_id', 'countStars' ,' full_name', 'stars'
    ];
    public function  Product()
    {
        return $this->hasOne("App\Models\Products",'id','product_id');
    }
}
