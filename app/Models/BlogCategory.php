<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public $timestamps = false;

    public function posts()
    {
    	return $this->hasMany('App\Models\BlogPost','category_id','id');
    }
}
