<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\SchoolGallery;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class SchoolController extends Controller
{
    public function View($value = 'index')
    {
        return 'admin.school.'.$value;
    }

    public function Route($value = 'index')
    {
        return 'admin.school.'.$value;
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
        $countries = Country::pluck('name','id');
        $cities = City::pluck('name','id');

        return view($this->view('create'),compact('countries','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(School $school, Request $request)
    {   

        $this->validate($request, [
            'name' => 'required|max:191|unique:schools',
            'description' => 'required|string',
            'image' => 'required|image|mimes:png,jpeg,jpg',
            'city' => 'required|numeric',
        ]);

        $school->name = $request->name;
        $school->slug = str_slug($request->name);
        $school->description = $request->description;
        $school->image = $request->image;
        $school->city_id = $request->city;

        if ($school->save()) 
        { 
            if ($request->image->isValid()) 
            {
                $path = 'storage/school/'.$school->id.'/';
                File::makeDirectory($path,0775,true,true);

                $filename = uniqid().'.'.$request->image->extension();

                $image = Image::make($request->image)->fit(900,500)->save($path.$filename);

                $school->image = $filename;
                $school->save();
            }   
            
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
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view($this->view('show'),compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {   
        $countries = Country::pluck('name','id');
        $cities = City::pluck('name','id');
        return view($this->view('edit'),compact('school','countries','cities'));
    }

    public function getCities(Request $request,Country $country)
    {
        if ($request->ajax()) {
            $cities = $country->cities->pluck('name','id');
            $html = view($this->view('ajax.cities'),compact('cities'))->render();
            return response($html);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $this->validate($request, [
            'name' => 'required|max:191|unique:schools',
            'description' => 'required|string',
            'image' => 'image|mimes:png,jpeg,jpg',
            'city' => 'required|numeric',
        ]);

        $school->name = $request->name;
        $school->slug = str_slug($request->name);
        $school->description = $request->description;
        $school->city_id = $request->city;

        if ($school->save()) 
        { 
            if ($request->image->isValid()) 
            {
                $path = 'storage/school/'.$school->id.'/';
                File::makeDirectory($path,0775,true,true);

                $filename = uniqid().'.'.$request->image->extension();

                $image = Image::make($request->image)->fit(900,500)->save($path.$filename);

                $school->image = $filename;
                $school->save();
            }   
            
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
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {   

        $dir = 'storage/school/'.$school->id;

        if (File::exists($dir)) {
            File::deleteDirectory($dir);
        }
       
        if ($school->delete()) {
            
            flash()->success('Registration has been deleted!')->important();
        }else{
            flash()->error('Opss. An error has occurred, please try again.')->important();
        }  

        return redirect()->route($this->route('index'));
    }
}
