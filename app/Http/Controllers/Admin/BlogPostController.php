<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogRating;
use App\Models\BlogTag;
use App\Models\BlogPostTag;

use Auth;
use Image;
use File;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    
    public function View($value = 'index')
    {
        return 'admin.blog.post.'.$value;
    }

    public function Route($value = 'index')
    {
        return 'admin.blog.post.'.$value;
    }

    public function getFormNewCategory(Request $request)
    {
        if ($request->ajax()) {
            $html = view($this->view('ajax.newcategory'))->render();
            return response()->json($html);
        }
    }
    public function getFormNewTag(Request $request)
    {
        if ($request->ajax()) {
            $html = view($this->view('ajax.newtag'))->render();
            return response()->json($html);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->view('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::pluck('name','id');
        $tags = BlogTag::pluck('name','id');

        return view($this->view('create'), compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|string|max:191',
            'body' => 'required|string',
            'category' => 'required|integer',
            'tags.*' => 'integer',
            'cover' => 'required|image|mimes:png,jpg,jpeg',
            'video' => 'max:191',
        ]);

        $post = new BlogPost;
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->video = $request->video;
        $post->user_id = Auth::user()->id;
        $post->cover = $request->cover;

        if ($post->save()) {

            if ($request->hasFile('cover')) {
                $image = $request->file('cover');
                $filename = $post->slug . '.' . $image->extension();
                $path = 'storage/blog/posts/'.$post->id.'/';
                File::makeDirectory($path,0775,true,true);
                $image = Image::make($image)->fit(870,340)->save($path.$filename);

                $post->cover = $filename;
                $post->save();
            }

            $post->tags()->attach($request->tags);

            flash()->success('Registration has been successfully created!')->important();
            return redirect()->route($this->route('index'));
            
        }else {
            flash()->error('Opss. An error has occurred, please try again.')->important();
            return redirect()->route($this->route('index'));
        }    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        return view($this->view('show'),compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::pluck('name','id');
        $tags = BlogTag::pluck('name','id');
        return view($this->view('edit'), compact('categories','tags','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $post)
    {
        $this->validate($request, [
            'title' => 'required|string|max:191',
            'body' => 'required|string',
            'category' => 'required|integer',
            'tags.*' => 'integer',
            'cover' => 'image|mimes:png,jpg,jpeg',
            'video' => 'max:191',
        ]);

        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->video = $request->video;

        if ($post->save()) {

            if ($request->hasFile('cover')) {
                $image = $request->file('cover');
                $filename = $post->slug . '.' . $image->extension();
                $path = 'storage/blog/posts/'.$post->id.'/';
                File::makeDirectory($path,0775,true,true);
                $image = Image::make($image)->fit(870,340)->save($path.$filename);

                $post->cover = $filename;
                $post->save();
            }

            $post->tags()->sync($request->tags);

            flash()->success('Registration has been successfully updated!')->important();
            return redirect()->route($this->route('index'));
            
        }else {
            flash()->error('Opss. An error has occurred, please try again.')->important();
            return redirect()->route($this->route('index'));
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        $dir = 'storage/blog/posts/'.$post->id;

        if (File::exists($dir)) {
            File::deleteDirectory($dir);
        }

        $post->tags()->detach();

        if ($post->delete()) {
            
            flash()->success('Registration has been deleted!')->important();
        }else{
            flash()->error('Opss. An error has occurred, please try again.')->important();
        }  

        return redirect()->route($this->route('index'));
    }
}
