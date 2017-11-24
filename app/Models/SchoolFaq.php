<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolFaq extends Model
{
	public $timestamps = false;
    public function School()
   	{
   		return $this->belongsTo('App\Models\School');
   	}
}
