<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function bills() 
    {
        return $this->hasMany(Bill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
