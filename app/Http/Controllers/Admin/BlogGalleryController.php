<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogGallery;
use App\Models\BlogPost;

use File;
use Image;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class BlogGalleryController extends Controller
{
    public function View($value = 'index')
    {
        return 'admin.blog.post.gallery.'.$value;
    }

    public function Route($value = 'index')
    {
        return 'admin.blog.post.gallery.'.$value;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogGallery  $blogGallery
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {   
        return view($this->view('show'),compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogGallery  $blogGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {   
        return view($this->view('edit'),compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogGallery  $blogGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $post)
    {
        $this->validate($request, [
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        if ($request->photos) 
        {
            $path = 'storage/blog/posts/'.$post->id.'/gallery/';
            File::makeDirectory($path,0775,true,true);

            foreach ($request->photos as $photo) 
            {
                $gallery = new BlogGallery ;
                $filename = uniqid().'.'.$photo->extension();
                $photo = Image::make($photo)->fit(870,342)->save($path.$filename);
                // $thumbnail = Image::make($photo)->fit(70)->save($path.'thumb-'.$filename);
                $gallery->photo = $filename;
                $gallery->blog_post_id = $post->id;
                $gallery->save();
            }
            
            flash()->success('Registration has been successfully created!')->important();
            return redirect()->route($this->route('show'),$post->id);
            
        }else {
            flash()->error('Opss. An error has occurred, please try again.')->important();
            return redirect()->route($this->route('show'),$post->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogGallery  $blogGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogGallery $gallery, $id)
    {
        $gallery = $gallery->find($id);

        $dir = 'storage/blog/posts/'.$gallery->post->id.'/gallery/'.$gallery->photo;
        // $dirthumb = 'storage/blog/posts/'.$gallery->post->id.'/gallery/thumb-'.$gallery->photo;

        if (File::exists($dir)) {
            File::delete($dir);
            // File::delete($dirthumb);
        }
       
        if ($gallery->delete()) {
            flash()->success('Registration has been deleted!')->important();
        }else{
            flash()->error('Opss. An error has occurred, please try again.')->important();
        }  

        return redirect()->route($this->route('show'),$gallery->post->id);
    }
}
