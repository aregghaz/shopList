<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoryAm extends Model
{
    protected $table  = "sub_category_ams";
    protected $fillable = ['name', 'category_am_id','id'];

    public function Category()
    {
        return $this->hasOne("App\Models\CategoryAm");
    }


    public function Product()
    {
        return $this->hasMany("App\Models\Products");
    }
}
