<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogGallery extends Model
{
	public $timestamps = false;

    public function Post()
   	{
   		return $this->belongsTo('App\Models\BlogPost','blog_post_id','id');
   	}

   	public function getPhotoAttribute($value)
    {
        return asset('storage/blog/posts/'.$this->attributes['blog_post_id'].'/gallery/'.$value);

    }
}
