@extends('layouts.app')

@section('breadcrumb')
<div class="page-title-container style4">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">{{ $destination->name }}</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="{{ route('site.home.index') }}">HOME</a></li>
            <li><a href="{{ route('site.destination.index') }}">Destinations</a></li>
            <li>
                <a href="{{ route('site.destination.country', $destination->country->slug) }}">
                    {{ $destination->country->name }}
                </a>
            </li>
            <li class="active">
                {{ $destination->name }}
            </li>
        </ul>
    </div>
</div>

@stop


@section('content')
<div id="main">
    <div class="row">
        <div class="col-sm-4 col-md-3">
            <h4 class="search-results-title"><i class="soap-icon-search"></i><b>{{ $destination->schools->count() }}</b> results found.</h4>
            <div class="toggle-container filters-container">
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                    </h4>
                    <div id="price-filter" class="panel-collapse collapse">
                        <div class="panel-content">
                            <div id="price-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 10%; width: 70%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 10%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 80%;"></a></div>
                            <br>
                            <span class="min-price-label pull-left">$100</span>
                            <span class="max-price-label pull-right">$800</span>
                            <div class="clearer"></div>
                        </div><!-- end content -->
                    </div>
                </div>
                
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#rating-filter" class="collapsed">User Rating</a>
                    </h4>
                    <div id="rating-filter" class="panel-collapse collapse">
                        <div class="panel-content">
                            <div id="rating" class="five-stars-container editable-rating ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 80%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 80%;"></a></div>
                            <br>
                            <small>2458 REVIEWS</small>
                        </div>
                    </div>
                </div>
                
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#accomodation-type-filter" class="collapsed">Accomodation Type</a>
                    </h4>
                    <div id="accomodation-type-filter" class="panel-collapse collapse">
                        <div class="panel-content">
                            <ul class="check-square filters-option">
                                <li><a href="#">All<small>(722)</small></a></li>
                                <li><a href="#">Hotel<small>(982)</small></a></li>
                                <li><a href="#">Resort<small>(127)</small></a></li>
                                <li class="active"><a href="#">Bed &amp; Breakfast<small>(222)</small></a></li>
                                <li><a href="#">Condo<small>(158)</small></a></li>
                                <li><a href="#">Residence<small>(439)</small></a></li>
                                <li><a href="#">Guest House<small>(52)</small></a></li>
                            </ul>
                            <a class="button btn-mini">MORE</a>
                        </div>
                    </div>
                </div>
                
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#amenities-filter" class="collapsed">Amenities</a>
                    </h4>
                    <div id="amenities-filter" class="panel-collapse collapse">
                        <div class="panel-content">
                            <ul class="check-square filters-option">
                                <li><a href="#">Bathroom<small>(722)</small></a></li>
                                <li><a href="#">Cable tv<small>(982)</small></a></li>
                                <li class="active"><a href="#">air conditioning<small>(127)</small></a></li>
                                <li class="active"><a href="#">mini bar<small>(222)</small></a></li>
                                <li><a href="#">wi - fi<small>(158)</small></a></li>
                                <li><a href="#">pets allowed<small>(439)</small></a></li>
                                <li><a href="#">room service<small>(52)</small></a></li>
                            </ul>
                            <a class="button btn-mini">MORE</a>
                        </div>
                    </div>
                </div>
                
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#language-filter" class="collapsed">Host Language</a>
                    </h4>
                    <div id="language-filter" class="panel-collapse collapse">
                        <div class="panel-content">
                            <ul class="check-square filters-option">
                                <li><a href="#">English<small>(722)</small></a></li>
                                <li><a href="#">Español<small>(982)</small></a></li>
                                <li class="active"><a href="#">Português<small>(127)</small></a></li>
                                <li class="active"><a href="#">Français<small>(222)</small></a></li>
                                <li><a href="#">Suomi<small>(158)</small></a></li>
                                <li><a href="#">Italiano<small>(439)</small></a></li>
                                <li><a href="#">Sign Language<small>(52)</small></a></li>
                            </ul>
                            <a class="button btn-mini">MORE</a>
                        </div>
                    </div>
                </div>
                
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                    </h4>
                    <div id="modify-search-panel" class="panel-collapse collapse">
                        <div class="panel-content">
                            <form method="post">
                                <div class="form-group">
                                    <label>destination</label>
                                    <input type="text" class="input-text full-width" placeholder="" value="Paris">
                                </div>
                                <div class="form-group">
                                    <label>check in</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" name="date_from" class="input-text full-width hasDatepicker" placeholder="mm/dd/yy" id="dp1511285372041"><img class="ui-datepicker-trigger" src="{{ asset('app/images/icon/blank.png') }}" alt="" title="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>check out</label>
                                    <div class="datepicker-wrap">
                                        <input type="text" name="date_to" class="input-text full-width hasDatepicker" placeholder="mm/dd/yy" id="dp1511285372042"><img class="ui-datepicker-trigger" src="{{ asset('app/images/icon/blank.png') }}" alt="" title="">
                                    </div>
                                </div>
                                <br>
                                <button class="btn-medium icon-check uppercase full-width">search again</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-9">
            <div class="sort-by-section clearfix">
                <h4 class="sort-by-title block-sm">Sort results by:</h4>
                <ul class="sort-bar clearfix block-sm">
                    <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
                    <li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
                    <li class="clearer visible-sms"></li>
                    <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>rating</span></a></li>
                    <li class="sort-by-popularity"><a class="sort-by-container" href="#"><span>popularity</span></a></li>
                </ul>
                
                <ul class="swap-tiles clearfix block-sm">
                    <li class="swap-list">
                        <a href="hotel-list-view.html"><i class="soap-icon-list"></i></a>
                    </li>
                    <li class="swap-grid">
                        <a href="hotel-grid-view.html"><i class="soap-icon-grid"></i></a>
                    </li>
                    <li class="swap-block active">
                        <a href="hotel-block-view.html"><i class="soap-icon-block"></i></a>
                    </li>
                </ul>
            </div>
                <div class="hotel-list listing-style3 hotel" >
                    @forelse($destination->schools as $school)
                    <article class="box">
                        <figure class="col-sm-5 col-md-4">
                            <a title="" href="{{ route('site.school.show',$school->slug) }}" class="hover-effect"><img width="270" height="160" alt="" src="{{ $school->image }}"></a>
                        </figure>
                        <div class="details col-sm-7 col-md-8">
                            <div>
                                <div>
                                    <h4 class="box-title"><a href="{{ route('site.school.show',$school->slug) }}">{{ $school->name }}</a><small><i class="soap-icon-departure yellow-color"></i> {{ $school->city->name }}, {{ $school->city->country->name }}</small></h4>
                                </div>
                            </div>
                            <div>
                                {!! $school->description !!}
                            </div>
                        </div>
                    </article>
                    @empty
                    No Records found.
                    @endforelse
                </div>
            {{-- <a href="#" class="uppercase full-width button btn-large">load more listing</a> --}}
        </div>
    </div>
</div>

@stop

