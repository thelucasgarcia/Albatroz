<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    public function Cities()
    {
    	return $this->hasMany('App\Models\City');
    }

    public function Schools()
    {
        return $this->hasManyThrough('App\Models\School', 'App\Models\City', 'country_id', 'city_id', 'id' ,'id');
    }

    
}
