<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message','from_id', 'to_id','read'];

    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from_id');
    }
}
