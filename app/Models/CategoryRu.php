<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryRu extends Model
{
    protected $table = "category_rus";
    protected $fillable = ['name', 'icon','id'];

    public function SubCategoryRu()
    {
        return $this->hasMany("App\Models\SubCategoryRu");
    }

    public function Product()
    {
        return $this->hasMany("App\Models\Products");
    }
}
