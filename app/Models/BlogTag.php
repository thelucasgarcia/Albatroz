<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
   	public $timestamps = false;

   	public function posts()
    {
    	return $this->belongsToMany('App\Models\BlogPost');
    }
}
