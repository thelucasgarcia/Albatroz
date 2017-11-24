@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
	<div class="row">
		<div class="col-md-4">
			
		<!-- /.box-header -->
	        <div class="box box-info pad text-center">
	            <!-- /.box-header -->
		        <div class="box-body">
			    <h4 >Olá, {{ Auth::user()->name }}</h4>
			    <ul class="list-unstyled">
	                <li>
	                    <i class="fa fa-envelope text-purple"></i>
	                    {{ Auth::user()->email }}</li>

	                <li>
	                    <i class="fa fa-user text-red"></i>
	                    <a class="text-black" href="">Acessar Perfil</a></li>
	            </ul>
		     	</div>      
			</div>
		</div>
	</div>
	
@stop