<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function Country()
    {
    	return $this->belongsTo('App\Models\Country');
    }

    public function Schools()
    {
    	return $this->hasMany('App\Models\School');
    }
}
