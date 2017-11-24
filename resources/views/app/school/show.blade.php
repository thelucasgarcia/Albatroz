@extends('layouts.app')

@section('breadcrumb')
<div class="page-title-container style4">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">{{ $school->name }}</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="{{ route('site.home.index') }}">HOME</a></li>
            <li><a href="{{ route('site.school.index') }}">Schools</a></li>
            <li class="active">
                {{ $school->name }}
            </li>
        </ul>
    </div>
</div>

@stop


@section('content')
<div class="row">
    <div id="main" class="col-md-9">
        <div class="tab-container style1" id="hotel-main-content">
            <ul class="tabs">
                <li class="active"><a data-toggle="tab" href="#photos-tab">photos</a></li>
                <li><a data-toggle="tab" href="#video-tab">video</a></li>
                <li class="pull-right"><a class="button btn-small yellow-bg white-color" href="#">TRAVEL GUIDE</a></li>
            </ul>
            <div class="tab-content">
                <div id="photos-tab" class="tab-pane fade in active">
                    <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                        <ul class="slides">

                            @foreach($school->gallery as $gallery)
                            <li><img src="{{ $gallery->photo }}" alt="" /></li>
                            @endforeach
                            
                        </ul>
                    </div>
                    <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                        <ul class="slides">

                            @foreach($school->gallery as $gallery)
                            <li><img src="{{ $gallery->photo }}" alt="" /></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div id="video-tab" class="tab-pane fade">
                    <div class="video-container">
                        <div class="full-video">
                            <iframe width="640" height="360" src="https://www.youtube.com/embed/qfm1tQwSZJ8" frameborder="0" gesture="media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="hotel-features" class="tab-container">
            <ul class="tabs">
                <li class="active"><a href="#school-description" data-toggle="tab">Description</a></li>
                <li><a href="#school-faqs" data-toggle="tab">FAQs</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="school-description">
                    <div class="long-description">
                        <h2>About Hilton Hotel and Resorts</h2>
                        <p>
                            Sed aliquam nunc eget velit imperdiet, in rutrum mauris malesuada. Quisque ullamcorper vulputate nisi, et fringilla ante convallis quis. Nullam vel tellus non elit suscipit volutpat. Integer id felis et nibh rutrum dignissim ut non risus. In tincidunt urna quis sem luctus, sed accumsan magna pellentesque. Donec et iaculis tellus. Vestibulum ut iaculis justo, auctor sodales lectus. Donec et tellus tempus, dignissim maurornare, consequat lacus. Integer dui neque, scelerisque nec sollicitudin sit amet, sodales a erat. Duis vitae condimentum ligula. Integer eu mi nisl. Donec massa dui, commodo id arcu quis, venenatis scelerisque velit.
                            <br />
                            <br /> Praesent eros turpis, commodo vel justo at, pulvinar mollis eros. Mauris aliquet eu quam id ornare. Morbi ac quam enim. Cras vitae nulla condimentum, semper dolor non, faucibus dolor. Vivamus adipiscing eros quis orci fringilla, sed pretium lectus viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec nec velit non odio aliquam suscipit. Sed non neque faucibus, condimentum lectus at, accumsan enim. Fusce pretium egestas cursus. Etiam consectetur, orci vel rutrum volutpat, odio odio pretium nisiodo tellus libero et urna. Sed commodo ipsum ligula, id volutpat risus vehicula in. Pellentesque non massa eu nibh posuere bibendum non sed enim. Maecenas lobortis nulla sem, vel egestas dui ullamcorper ac.
                            <br />
                            <br /> Sed scelerisque lectus sit amet faucibus sodales. Proin ut risus tortor. Etiam fermentum tellus auctor, fringilla sapien et, congue quam. In a luctus tortor. Suspendisse eget tempor libero, ut sollicitudin ligula. Nulla vulputate tincidunt est non congue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus at est imperdiet, dapibus ipsum vel, lacinia nulla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus id interdum lectus, ut elementum elit. Nullam a molestie magna. Praesent eros turpis, commodo vel justo at, pulvinar mollis eros. Mauris aliquet eu quam id ornare. Morbi ac quam enim. Cras vitae nulla condimentum, semper dolor non, faucibus dolor. Vivamus adipiscing eros quis orci fringilla, sed pretium lectus viverra.
                        </p>
                    </div>
                </div>
                <div class="tab-pane fade" id="school-faqs">
                    <h2>Frequently Asked Questions</h2>

                    <div class="toggle-container">

                        @foreach($school->faq as $faq)

                        <div class="panel style1 arrow-right">
                            <h4 class="panel-title">
                                <a class="collapsed" href="#question{{ $faq->id }}" data-toggle="collapse">
                                    {{ $faq->question }}
                                </a>
                            </h4>
                            <div class="panel-collapse collapse" id="question{{ $faq->id }}">
                                <div class="panel-content">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- SIDEBAR  --}}
    <div class="sidebar col-md-3">
        <article class="detailed-logo">
            <figure>
                <img width="114" height="85" src="{{ $school->image }}" alt="">
            </figure>
            <div class="details">
                <h2 class="box-title">{{ $school->name }}<small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space">{{ $school->city->name }}, {{ $school->city->country->name }}</span></small></h2>

                <div class="feedback clearfix">
                    <div title="4 stars" class="five-stars-container" data-toggle="tooltip" data-placement="bottom"><span class="five-stars" style="width: 80%;"></span></div>
                    <span class="review pull-right">270 reviews</span>
                </div>
                <p class="description">Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                {{-- <a class="button yellow full-width uppercase btn-small">add to wishlist</a> --}}
            </div>
        </article>

        @include('app.modules.need-a-help')

        <div class="travelo-box">
            <h4>Similar Listings</h4>
            <div class="image-box style14">
                <article class="box">
                    <figure>
                        <a href="#"><img src="http://placehold.it/63x59" alt="" /></a>
                    </figure>
                    <div class="details">
                        <h5 class="box-title"><a href="#">Plaza Tour Eiffel</a></h5>
                        <label class="price-wrapper">
                            <span class="price-per-unit">$170</span>avg/night
                        </label>
                    </div>
                </article>
                <article class="box">
                    <figure>
                        <a href="#"><img src="http://placehold.it/63x59" alt="" /></a>
                    </figure>
                    <div class="details">
                        <h5 class="box-title"><a href="#">Sultan Gardens</a></h5>
                        <label class="price-wrapper">
                            <span class="price-per-unit">$620</span>avg/night
                        </label>
                    </div>
                </article>
                <article class="box">
                    <figure>
                        <a href="#"><img src="http://placehold.it/63x59" alt="" /></a>
                    </figure>
                    <div class="details">
                        <h5 class="box-title"><a href="#">Park Central</a></h5>
                        <label class="price-wrapper">
                            <span class="price-per-unit">$322</span>avg/night
                        </label>
                    </div>
                </article>
            </div>
        </div>
        <div class="travelo-box book-with-us-box">
            <h4>Why Book with us?</h4>
            <ul>
                <li>
                    <i class="soap-icon-hotel-1 circle"></i>
                    <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                </li>
                <li>
                    <i class="soap-icon-savings circle"></i>
                    <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                </li>
                <li>
                    <i class="soap-icon-support circle"></i>
                    <h5 class="title"><a href="#">Excellent Support</a></h5>
                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                </li>
            </ul>
        </div>

    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
        tjq(document).ready(function() {
            // calendar panel
            var cal = new Calendar();
            var unavailable_days = [17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
            var price_arr = {
                3: '$170',
                4: '$170',
                5: '$170',
                6: '$170',
                7: '$170',
                8: '$170',
                9: '$170',
                10: '$170',
                11: '$170',
                12: '$170',
                13: '$170',
                14: '$170',
                15: '$170',
                16: '$170',
                17: '$170'
            };

            var current_date = new Date();
            var current_year_month = (1900 + current_date.getYear()) + "-" + (current_date.getMonth() + 1);
            tjq("#select-month").find("[value='" + current_year_month + "']").prop("selected", "selected");
            cal.generateHTML(current_date.getMonth(), (1900 + current_date.getYear()), unavailable_days, price_arr);
            tjq(".calendar").html(cal.getHTML());

            tjq("#select-month").change(function() {
                var selected_year_month = tjq("#select-month option:selected").val();
                var year = parseInt(selected_year_month.split("-")[0], 10);
                var month = parseInt(selected_year_month.split("-")[1], 10);
                cal.generateHTML(month - 1, year, unavailable_days, price_arr);
                tjq(".calendar").html(cal.getHTML());
            });

            tjq(".goto-writereview-pane").click(function(e) {
                e.preventDefault();
                tjq('#hotel-features .tabs a[href="#hotel-write-review"]').tab('show')
            });

            // editable rating
            tjq(".editable-rating.five-stars-container").each(function() {
                var oringnal_value = tjq(this).data("original-stars");
                if (typeof oringnal_value == "undefined") {
                    oringnal_value = 0;
                } else {
                    //oringnal_value = 10 * parseInt(oringnal_value);
                }
                tjq(this).slider({
                    range: "min",
                    value: oringnal_value,
                    min: 0,
                    max: 5,
                    slide: function(event, ui) {

                    }
                });
            });
        });

        tjq('a[href="#map-tab"]').on('shown.bs.tab', function(e) {
            var center = panorama.getPosition();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
        tjq('a[href="#steet-view-tab"]').on('shown.bs.tab', function(e) {
            fenway = panorama.getPosition();
            panoramaOptions.position = fenway;
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        });
        var map = null;
        var panorama = null;
        var fenway = new google.maps.LatLng(48.855702, 2.292577);
        var mapOptions = {
            center: fenway,
            zoom: 12
        };
        var panoramaOptions = {
            position: fenway,
            pov: {
                heading: 34,
                pitch: 10
            }
        };

        function initialize() {
            tjq("#map-tab").height(tjq("#hotel-main-content").width() * 0.6);
            map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
            panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
            map.setStreetView(panorama);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop