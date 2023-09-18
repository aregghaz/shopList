<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductName extends Model
{
    protected $table = "product_names";
    protected $fillable = [
        'nameAm', 'nameRu', 'nameEn', 'descriptionEn', 'descriptionRu' , 'descriptionAm'
    ];

    public function Product()
    {
        return $this->hasOne("App\Models\Products", 'product_id', 'id');
    }
    public function Orders()
    {
        return $this->hasMany("App\Models\Orders",'product_id','id');
    }
    public function AverangeStars()
    {
        return $this->hasOne("App\Models\AverangeStars",'product_id','id');

    }
}
