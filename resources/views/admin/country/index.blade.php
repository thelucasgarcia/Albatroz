@extends('adminlte::page')

@section('title', 'Country')

@section('content_header')
    <h1>Country</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Country</li>
    </ol>
@stop

@section('content')
<div class="row">
    
    <div class="col-md-12">
         @include('flash::message')
    </div>

    @if(!isset($country))
        @include('admin.country.create')
    @else
        @include('admin.country.edit',['country' => $country])
    @endif

    <div class="col-md-8">
        <div class="box box-info pad">
            <div class="box-header with-border">
                <i class="fa fa-list"></i>
                <h4 class="box-title">List Countries</h4>
            </div>

            <div class="box-body">
                
                <div id="table-container">
                    @include('admin.country.table')
                </div>
                      
            </div>

        </div>
        <!-- /.box -->
    </div>
    
    


</div>

@stop