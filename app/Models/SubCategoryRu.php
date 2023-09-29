<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoryRu extends Model
{
    protected $table  = "sub_category_rus";
    protected $fillable = ['name', 'category_ru_id','id'];

    public function Category()
    {
        return $this->hasOne("App\Models\CategoryRu");
    }


    public function Product()
    {
        return $this->hasMany("App\Models\Products");
    }
}
