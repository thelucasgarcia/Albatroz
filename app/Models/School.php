<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function City()
    {
    	return $this->belongsTo('App\Models\City');
    }

    public function Gallery()
    {
    	return $this->hasMany('App\Models\SchoolGallery');
    }

    public function Faq()
    {
        return $this->hasMany('App\Models\SchoolFaq');
    }

    public function getImageAttribute($value)
    {
        return asset('storage/school/'.$this->attributes['id'].'/'.$value);
    }
}
