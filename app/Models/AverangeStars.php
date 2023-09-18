<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AverangeStars extends Model
{
    protected $table = "averange_stars";
    protected $fillable = ['product_id', 'rate', 'count'];
    public function Product()
    {
        return $this->hasOne("App\Models\AverangeStars",'id','product_id');

    }public function ProductName()
    {
        return $this->hasOne("App\Models\AverangeStars",'id','product_id');

    }
}
