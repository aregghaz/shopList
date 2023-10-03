<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'address',
        'post_code',
        'country',
        'city',
        'state',
        'user_id',
        "type",
    ];
}
