<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class CountryController extends Controller
{   
    public function View($value = 'index')
    {
        return 'admin.country.'.$value;
    }

    public function Route($value = 'index')
    {
        return 'admin.country.'.$value;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Country $country)
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
        return view($this->view('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Country $country, Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:80|unique:countries',
            'image' => 'required|image|mimes:png,jpeg,jpg',
        ]);

        $country->name = $request->name;
        $country->slug = str_slug($request->name);
        $country->image = $request->image;

        if ($country->save()) {
            if ($request->image->isValid() ) {

                $path = 'storage/country/'.$country->slug.'/';
                File::makeDirectory($path,0775,true,true);
                $nome = $country->slug.'.'.$request->image->extension();
                $image = Image::make($request->image)->resize(270,null,function($limit){$limit->aspectRatio();});
                $image = Image::canvas(270,160,'#fffff')
                ->insert($image,'center')
                ->save($path.$nome);

                $country->image = $nome;
                $country->save();

            }

            flash()->success('Registration has been successfully created!')->important();
            return redirect()->route($this->route());
            
        }else {
            flash()->error('Opss. An error has occurred, please try again.')->important();
            return redirect()->route($this->route());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {   

        return view($this->view('index'))->withCountry($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->validate($request, [
            'name' => 'required|max:80|unique:countries,name,'.$request->name.',name',
            'image' => 'image|mimes:png,jpeg,jpg',
        ]);

        $country->name = $request->name;
        $country->slug = str_slug($request->name);

        if ($country->save()) {

            if ($request->image->isValid() ) {

                $path = 'storage/country/'.$country->slug.'/';
                File::makeDirectory($path,0775,true,true);
                $nome = $country->slug.'.'.$request->image->extension();
                $image = Image::make($request->image)->resize(270,null,function($limit){$limit->aspectRatio();});
                $image = Image::canvas(270,160,'#fffff')
                ->insert($image,'center')
                ->save($path.$nome);

                $country->image = $nome;
                $country->save();

            }

            flash()->success('Registration has been successfully created!')->important();
            return redirect()->route($this->route());
            
        }else {
            flash()->error('Opss. An error has occurred, please try again.')->important();
            return redirect()->route($this->route());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {

        $dir = 'storage/country/'.$country->slug;

        if (File::exists($dir)) {
            File::deleteDirectory($dir);
        }

        foreach ($country->schools as $school) {
            $dir = 'storage/school/'.$school->id;
            if (File::exists($dir)) {
                File::deleteDirectory($dir);
            }
        }
       
        if ($country->delete()) {
            
            flash()->success('Registration has been deleted!')->important();
        }else{
            flash()->error('Opss. An error has occurred, please try again.')->important();
        }  

        return redirect()->route('admin.country.index');
    }
}
