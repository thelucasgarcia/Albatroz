<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolGallery extends Model
{
   	public $timestamps = false;

   	public function School()
   	{
   		return $this->belongsTo('App\Models\School');
   	}

   	public function getPhotoAttribute($value)
    {
        return asset('storage/school/'.$this->attributes['school_id'].'/gallery/'.$value);
    }
}
