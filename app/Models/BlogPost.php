<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Models\BlogCategory');
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\BlogGallery');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Models\BlogTag');
    }
    public function comments()
    {
    	return $this->hasMany('App\Models\BlogComment');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCoverAttribute($value)
    {
        return asset('storage/blog/posts/'.$this->attributes['id'].'/'.$value);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */


   
}
