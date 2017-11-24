<?php

namespace App\Http\Controllers\Site;

use App\Models\School;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        $schools = School::all();
        
        if ($request->ajax()) {
            if ($request->city_id) {
                $city = City::find($request->city_id);
                $country = $city->country;
                $school = $city->schools;
            }
            
        }else{

        
        $country = Country::pluck('name','id');
        $city = City::pluck('name','id');
        $school = School::pluck('name','id');

            if ($request->all()) {

                if ($request->country) {
                    $schools = Country::find($request->country)->schools;
                }
                if ($request->city) {
                    $schools = $schools->where('city_id', $request->city);
                }

                if ($request->school) {
                    $schools = $schools->where('id', $request->school);
                }
               
            }
        }


    
        return view('app.school.index',compact('schools','school','country','city'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($school)
    {   
        $school = School::whereSlug($school)->firstOrFail();
        return view('app.school.show',compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
