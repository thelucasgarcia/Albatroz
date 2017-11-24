@extends('adminlte::page')

@section('title', 'City')

@section('content_header')
    <h1>City</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>City</li>
    </ol>
@stop

@section('content')
<div class="row">
    
    <div class="col-md-12">
         @include('flash::message')
    </div>

    @if(!isset($city))
        @include('admin.city.create')
    @else
        @include('admin.city.edit',['city' => $city])
    @endif

    <div class="col-md-8">
        <div class="box box-info pad">
            <div class="box-header with-border">
                <i class="fa fa-list"></i>
                <h4 class="box-title">List Cities</h4>
            </div>

            <div class="box-body">
                
                <div id="table-container">
                    @include('admin.city.table')
                </div>
                      
            </div>

        </div>
        <!-- /.box -->
    </div>
    
    


</div>

@stop