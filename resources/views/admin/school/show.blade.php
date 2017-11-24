@extends('adminlte::page')

@section('title', 'Show')

@section('content_header')
    <h1>School</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Blog</li>
        <li><a href="{{ route('admin.blog.post.index') }}">School</a></li>
        <li>{{ $school->title }}</li>
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
              <i class="fa fa-eye"></i>

              <h3 class="box-title">School Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-8">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd>{{ $school->name }}</dd>

                            <dt>Location</dt>
                            <dd>{{ $school->city->name }}, {{ $school->city->country->name }}</dd>
    
                            <dt>Created in</dt>
                            <dd>{{ $school->created_at }}</dd>

                            <dt>Updated in</dt>
                            <dd>{{ $school->updated_at }}</dd>

                            <dt>Description</dt>
                            <dd>{!! $school->description !!}</dd>
                        </dl>
                    </div>

                    <div class="col-md-4">
                        <dl>
                            <dt>Current Cover</dt>
                            <dd><img src="{{ $school->image }}" alt="" class="img-responsive"></dd>
                        </dl>
                    </div>
                </div>
              
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.school.destroy', $school->id]]) !!}
                <div class="btn-group-sm">
                    <a href="{{ route('admin.school.index') }}" class="btn btn-info">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <a class="btn btn-primary" href="{{ route('admin.school.gallery.show', $school->id) }}">
                        <i class="fa fa-picture-o"></i> Gallery
                    </a>
                    <a class="btn btn-warning" href="{{ route('admin.school.edit', $school->id) }}">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <button type="submit" class="btn btn-danger" onclick='if (confirm("By confirming the registration will be deleted!")) { document.submit(); } event.returnValue = false; return false;' data-type='confirm'>
                        <i class="fa fa-times"></i> Delete
                    </button>
                </div>

                {!! Form::close() !!}
            </div>
          </div>
    </div>

</div>

@stop