<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAm extends Model
{
    protected $table = "category_ams";
    protected $fillable = ['name', 'icon','id'];

    public function SubCategoryAm()
    {
        return $this->hasMany("App\Models\SubCategoryAm");
    }

    public function Product()
    {
        return $this->hasMany("App\Models\Products");
    }
}
