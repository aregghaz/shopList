<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table  = "sub_categories";
    protected $fillable = ['name', 'category_id','id'];

    public function Category()
    {
        return $this->hasOne("App\Models\Category");
    }


    public function Product()
    {
        return $this->hasMany("App\Models\Products");
    }

}
