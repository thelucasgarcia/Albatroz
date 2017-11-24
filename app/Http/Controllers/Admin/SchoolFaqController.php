<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\SchoolFaq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class SchoolFaqController extends Controller
{
    public function View($value = 'index')
    {
        return 'admin.school.faq.'.$value;
    }

    public function Route($value = 'index')
    {
        return 'admin.school.faq.'.$value;
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
    public function store(School $school, Request $request)
    {   

        if ($request->ajax()) {
            $faq = new SchoolFaq;
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->school_id = $school->id;

            if ($faq->save()) {
                $html = view('admin.school.faq.table',compact('school'))->render();
                return response($html);
            }
        }
        

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolGallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolGallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolFaq $faq)
    {   

        if ($faq->delete()) {
            flash()->success('Registration has been deleted!')->important();
        }else{
            flash()->error('Opss. An error has occurred, please try again.')->important();
        }  

        return redirect()->route($this->route('show'),$faq->school->id);
    }
}
