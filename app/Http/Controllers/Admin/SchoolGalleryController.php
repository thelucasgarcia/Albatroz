<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\SchoolGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class SchoolGalleryController extends Controller
{
    public function View($value = 'index')
    {
        return 'admin.school.gallery.'.$value;
    }

    public function Route($value = 'index')
    {
        return 'admin.school.gallery.'.$value;
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolGallery  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view($this->view('show'))->withSchool($school);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolGallery  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view($this->view('edit'))->withSchool($school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolGallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school, SchoolGallery $gallery)
    {

        $this->validate($request, [
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        if ($request->photos) 
        {
            $path = 'storage/school/'.$school->id.'/gallery/';
            File::makeDirectory($path,0775,true,true);

            foreach ($request->photos as $photo) 
            {
                $gallery = new SchoolGallery ;
                $filename = uniqid().'.'.$photo->extension();
                $cover = Image::make($photo)->fit(900,500)->save($path.$filename);
                $thumbnail = Image::make($photo)->fit(70)->save($path.'thumb-'.$filename);
                $gallery->photo = $filename;
                $gallery->school_id = $school->id;
                $gallery->save();
            }
            
            flash()->success('Registration has been successfully created!')->important();
            return redirect()->route($this->route('show'),$school->id);
            
        }else {
            flash()->error('Opss. An error has occurred, please try again.')->important();
            return redirect()->route($this->route('show'),$school->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolGallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolGallery $gallery, $id)
    {   
        $gallery = $gallery->find($id);
        $dir = 'storage/school/'.$gallery->school->id.'/gallery/'.$gallery->photo;
        $dirthumb = 'storage/school/'.$gallery->school->id.'/gallery/thumb-'.$gallery->photo;

        if (File::exists($dir)) {
            File::delete($dir);
            File::delete($dirthumb);
        }
       
        if ($gallery->delete()) {
            flash()->success('Registration has been deleted!')->important();
        }else{
            flash()->error('Opss. An error has occurred, please try again.')->important();
        }  

        return redirect()->route($this->route('show'),$gallery->school->id);
    }
}
