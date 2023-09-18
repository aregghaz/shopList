<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    protected $casts = [
        'colors' => 'array',
        'images' => 'array'
    ];


    protected $fillable = [
        'user_id', 'user', 'category_id', 'sub_category_id', 'title', 'price',  'images', 'sku', 'availability', 'size', 'color', 'product_id'
    ];


    public function SubCategoryProduct()
    {
        return $this->hasOne("App\Models\SubCategory",'id','sub_category_id');
    }
    public function SubCategoryProductRu()
    {
        return $this->hasOne("App\Models\SubCategoryRu",'id','sub_category_id');
    }
    public function SubCategoryProductAm()
    {
        return $this->hasOne("App\Models\SubCategoryAm",'id','sub_category_id');
    }

    public function CategoryProduct()
    {
        return $this->hasOne("App\Models\Category",'id','category_id');
    }
    public function CategoryProductAm()
    {
        return $this->hasOne("App\Models\CategoryAm",'id','category_id');
    }
    public function Company()
    {
        return $this->hasOne("App\Models\Companies",'user_id','user_id');
    }
    public function CategoryProductRu()
    {
        return $this->hasOne("App\Models\CategoryRu",'id','category_id');
    }
    public function ProductName()
    {
        return $this->hasOne("App\Models\ProductName",'id','product_id');
    }
    public function Statistic()
    {
        return $this->hasMany("App\Models\Statistic",'id','product_id');
    }
    public function Review()
    {
        return $this->hasMany("App\Models\Review",'product_id','id');

    }public function AverangeStars()
    {
        return $this->hasOne("App\Models\AverangeStars",'product_id','id');

    }

}
