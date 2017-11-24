@extends('layouts.app')

@section('breadcrumb')
<div class="page-title-container style4">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">Destinations</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="#">HOME</a></li>
            <li class="active">
                Destinations
            </li>
        </ul>
    </div>
</div>

@stop


@section('content')
<div id="main">
    <div class="block">
                    <h1>All Destinations</h1>
                    <div class="row image-box style10">
                        @foreach($destinations as $destination)
                        <div class="col-sm-6 col-md-3">
                            <article class="box">
                                <figure class="animated" data-animation-type="fadeInDown" data-animation-duration="2">
                                    <a href="{{ route('site.destination.country', $destination->slug) }}" title="{{ $destination->name }}" class="hover-effect"><img src="{{ asset('storage/country/'.$destination->slug.'/'.$destination->image) }}" alt="" width="270" height="160" /></a>
                                </figure>
                                <div class="details">
                                    <a href="{{ route('site.destination.country', $destination->slug) }}" class="button btn-mini">SEE ALL</a>
                                    <h4 class="box-title">{{ $destination->name }}<small>({{ $destination->cities->count() }} cities)</small></h4>
                                </div>
                            </article>
                        </div>
                        @endforeach

                    </div>
                </div>
</div>

@stop

