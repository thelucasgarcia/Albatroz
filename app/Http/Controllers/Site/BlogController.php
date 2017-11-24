<?php

namespace App\Http\Controllers\Site;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogTag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::latest()->get();
        return view('app.blog.post.index',compact('posts'));
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
    public function addComment(Request $request, BlogPost $post)
    {

        if ($request->ajax()) {
            $comment = new BlogComment;
            $comment->name = title_case($request->name);
            $comment->email = $request->email;
            $comment->text = $request->text;
            $comment->blog_post_id = $post->id;

            if ($comment->save()) {
                $html = view('app.blog.post.comments',compact('post'))->render();
                return response($html);
            }
        }
        
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
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        $next = $post->find($post->where('id','>', $post->id)->min('id'));
        $prev = $post->find($post->where('id','<', $post->id)->max('id'));

        return view('app.blog.post.show',compact('post','next','prev'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function category($category)
    {
        $posts = BlogCategory::where('name',$category)->firstOrFail()->posts()->latest()->get();
        return view('app.blog.post.index',compact('posts'));
    }

    public function tag($tag)
    {
        $posts = BlogTag::where('name',$tag)->firstOrFail()->posts()->latest()->get();
        return view('app.blog.post.index',compact('posts'));
    }

    public function search(BlogPost $posts, Request $request)
    {
        $search = \Request::get('s'); //<-- we use global request to get the param of URI

        if (empty($search)) {
            return redirect()->route('site.blog.index');
        }

        $posts = $posts->where(function($query) use ($search){

            $query->where('title','like', '%'.$search.'%');
            $query->orwhere('body','like', '%'.$search.'%');

        })->latest()->get();

        return view('app.blog.post.index',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        //
    }
}
