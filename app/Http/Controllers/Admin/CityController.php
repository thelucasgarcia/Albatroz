<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class CityController extends Controller
{
    public function View($value = 'index')
    {
        return 'admin.city.'.$value;
    }

    public function Route($value = 'index')
    {
        return 'admin.city.'.$value;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(City $city)
    {
        return view($this->view('index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(City $city, Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:80|unique:countries',
            'country' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpeg,jpg',
        ]);

        $city->name = $request->name;
        $city->slug = str_slug($request->name);
        $city->country_id = $request->country;
        $city->image = $request->image;

        if ($city->save()) {

            if ($request->hasFile('image')) {

                $path = 'storage/country/'.$city->country->slug.'/'.$city->slug.'/';
                File::makeDirectory($path,0775,true,true);
                $nome = str_slug($city->name).'.jpg';
                $image = Image::make($request->image)->resize(270,null,function($limit){$limit->aspectRatio();});
                $image = Image::canvas(270,160,'#fffff')
                ->insert($image,'center')
                ->save($path.$nome);

                $city->image = $nome;
                $city->save();

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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view($this->view('index'))->withCity($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'name' => 'required|max:80|unique:countries',
            'country' => 'required|numeric',
            'image' => 'image|mimes:png,jpeg,jpg',
        ]);

        $city->name = $request->name;
        $city->slug = str_slug($request->name);
        $city->country_id = $request->country;

        if ($city->save()) {
            if ($request->hasFile('image')) {

                $path = 'storage/country/'.$city->country->slug.'/'.$city->slug.'/';
                File::makeDirectory($path,0775,true,true);
                $nome = str_slug($city->name).'.jpg';
                $image = Image::make($request->image)->resize(270,null,function($limit){$limit->aspectRatio();});
                $image = Image::canvas(270,160,'#fffff')
                ->insert($image,'center')
                ->save($path.$nome);

                $city->image = $nome;
                $city->save();

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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {   
        $dir = 'storage/country/'.$city->country->slug.'/'.$city->slug.'/';

        if (File::exists($dir)) {
            File::deleteDirectory($dir);
        }

        if ($city->delete()) {
            
            flash()->success('Registration has been deleted!')->important();
        }else{
            flash()->error('Opss. An error has occurred, please try again.')->important();
        }  

        return redirect()->route('admin.city.index');
    }
}
