@extends('adminlte::page')

@section('title', 'School')

@section('content_header')
    <h1>School</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="{{ route('admin.school.index') }}">School</a></li>
        <li><a href="{{ route('admin.school.gallery.show', $school->id) }}">Gallery</a></li>
        <li>New</li>
    </ol>
@stop

@section('content')
<div class="row">
    
    <div class="col-md-12">
         @include('flash::message')
    </div>
   
    <div class="col-md-12">
        <div class="box box-info pad">
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>
                <h4 class="box-title">Add Gallery</h4>
            </div>

            <div class="box-body">

                {!! Form::open(['method' => 'PUT', 'route' => ['admin.school.gallery.update', $school->id], 'files' => 'true']) !!}
                
                    <div class="form-group{{ $errors->has('photo[]') ? ' has-error' : '' }}">
                        {!! Form::label('photos[]', 'Imagens') !!}
                        {!! Form::file('photos[]', ['class' => 'form-control','required' => 'required','multiple']) !!}
                        <p class="help-block">Images will be resized to size 900x500px</p>
                        <small class="text-danger">{{ $errors->first('photo[]') }}</small>
                    </div>
                        <a href="{{ route('admin.school.gallery.show',$school->id) }}" class="btn btn-default">Cancel</a>
                        {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
                
                {!! Form::close() !!}
            </div>

        </div>
        <!-- /.box -->
    </div>

</div>

@stop