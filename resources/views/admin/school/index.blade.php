@extends('adminlte::page')

@section('title', 'School')

@section('content_header')
    <h1>School</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>School</li>
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
                <i class="fa fa-list"></i>
                <h4 class="box-title">List Schools</h4>
                <div class="box-tools pull-right">
                    <a href="{{ route('admin.school.create') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> <b>REGISTER NEW</b>
                    </a>
                </div>
            </div>

            <div class="box-body">

                <table class="table table-responsive table-striped table-bordered" width="100%" id="datatable">
                    <thead>
                        <style>thead th {text-align: center}</style>
                        <th>#</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Gallery</th>
                        <th>FAQ</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        @inject('schools', 'App\Models\School')
                        @foreach($schools->all() as $school)
                            <tr>
                                <td scope="row">{{ $school->id }}</td>
                                <td>{{ $school->name }}</td>
                                <td>{{ $school->city->name }}</td>
                                <td>{{ $school->city->country->name }}</td>
                                <td>({{ $school->gallery->count() }})</td>
                                <td>({{ $school->faq->count() }})</td>
                                <td class="text-center">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.school.destroy', $school->id]]) !!}
                                    <div class="btn-group-sm">
                                        <a class="btn bg-olive" href="{{ route('admin.school.gallery.show', $school->id) }}">
                                            <i class="fa fa-picture-o"></i>
                                        </a>
                                        <a class="btn bg-purple" href="{{ route('admin.school.faq.show', $school->id) }}">
                                            <i class="fa fa-question-circle"></i>
                                        </a>
                                        <a class="btn btn-info" href="{{ route('admin.school.show', $school->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning" href="{{ route('admin.school.edit', $school->id) }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" onclick='if (confirm("By confirming the registration will be deleted!")) { document.submit(); } event.returnValue = false; return false;' data-type='confirm'>
                                            <i class="fa fa-times"></i>
                                        </button>
                                        
                                    </div>

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                      
            </div>

        </div>
        <!-- /.box -->
    </div>

</div>

@stop