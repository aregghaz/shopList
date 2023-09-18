<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['name', 'icon','id'];

    public function SubCategory()
    {
        return $this->hasMany("App\Models\SubCategory");
    }

    public function Product()
    {
        return $this->hasMany("App\Models\Products");
    }
}
