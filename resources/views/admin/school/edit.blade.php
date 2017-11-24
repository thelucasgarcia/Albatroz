@extends('adminlte::page')

@section('title', 'Edit')

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

    {!! Form::model($school, ['route' => ['admin.school.update', $school->id], 'method' => 'PUT', 'files' => 'true']) !!}

    <div class="col-md-8">
        <div class="box box-info pad">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h4 class="box-title">Info School</h4>
            </div>

            <div class="box-body">
                
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'School Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'ckeditor', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
                    
            </div>

        </div>
        <!-- /.box -->
        
    </div>

    <div class="col-md-4">
        <div class="box box-info pad">
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>
                <h4 class="box-title">Publish</h4>
            </div>

            <div class="box-footer">
                <div class="btn-group pull-right">
                    <a href="{{ route('admin.school.index') }}" class="btn btn-default">Cancel</a>
                    {!! Form::submit('Publish', ['class' => 'btn btn-info']) !!}
                </div>
            </div>

        </div>
        <!-- /.box -->

        <div class="box box-info pad">
            <div class="box-header with-border">
                <i class="fa fa-globe"></i>
                <h4 class="box-title">City</h4>
            </div>

            <div class="box-body">
                
                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                    {!! Form::label('country', 'Country') !!}
                    {!! Form::select('country', $countries, $school->country_id, ['id' => 'country', 'class' => 'form-control select2', 'required' => 'required', 'placeholder' => 'Select...']) !!}
                    <small class="text-danger">{{ $errors->first('country') }}</small>
                </div>
                
                <div id="city">
                    @include('admin.school.ajax.cities')
                </div>
                
                    
            </div>

        </div>
        <!-- /.box -->


        <div class="box box-info pad">
            <div class="box-header with-border">
                <i class="fa fa-photo"></i>
                <h4 class="box-title">School Image</h4>
            </div>

            <div class="box-body">
                
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                </div>
                    
            </div>

        </div>
        <!-- /.box -->
        
    </div>


    {!! Form::close() !!}
</div>
                
@stop

@section('js')
<script>

    $('#country').on('change', function(e) {
        var country_id = e.target.value;
        if (cat_id == '') {
            return false;
        }
        $.get('/admin/school/get-cities/' + country_id, function(data) {

            $('#city').empty();
            $('#city').html(data);
        });
    });
</script>
@stop