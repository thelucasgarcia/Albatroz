<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class BlogTagController extends Controller
{
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
    public function store(BlogTag $blogTag, Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request,[
                'newtag' => 'required|max:30|string|unique:blog_tags,name'
            ]);

            $blogTag->name = title_case($request->newtag);
            $blogTag->slug = str_slug($request->newtag);
            if ($blogTag->save()) {
                return response()->json($blogTag);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogTag  $blogTag
     * @return \Illuminate\Http\Response
     */
    public function show(BlogTag $blogTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogTag  $blogTag
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogTag $blogTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogTag  $blogTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogTag $blogTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogTag  $blogTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogTag $blogTag)
    {
        //
    }
}
