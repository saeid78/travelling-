<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    public function flights(){
        return $this->belongsToMany('App\Flight');
    }
}
