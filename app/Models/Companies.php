<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = ['name', 'logo', 'user_id', 'img1', 'img2', 'img3'];
    public function Products()
    {
        return $this->hasMany("App\Models\Products",'user_id','user_id');
    }
}
